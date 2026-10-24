<?php

namespace Tests\Feature;

use App\Models\Laporan;
use App\Models\User;
use Database\Seeders\PetugasSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class AuthTest extends TestCase
{
    use RefreshDatabase;

    public function test_guest_is_redirected_to_login_for_protected_pages(): void
    {
        $this->get('/laporan')->assertRedirect(route('login'));
        $this->get('/profil')->assertRedirect(route('login'));

        $laporan = Laporan::create(['nama' => 'Budi', 'lokasi' => 'Baleendah', 'deskripsi' => 'Air naik']);
        $this->delete(route('laporan.destroy', $laporan))->assertRedirect(route('login'));
        $this->assertDatabaseHas('laporans', ['id' => $laporan->id]);
    }

    public function test_guest_can_open_form_and_submit_report(): void
    {
        $this->get('/form')->assertOk();

        $this->post('/submit', [
            'nama' => 'Siti',
            'lokasi' => 'Dayeuhkolot',
            'deskripsi' => 'Banjir setinggi lutut',
        ])->assertOk()->assertSee('Dayeuhkolot');

        $this->assertDatabaseHas('laporans', ['nama' => 'Siti', 'lokasi' => 'Dayeuhkolot']);
    }

    public function test_submit_report_is_validated(): void
    {
        $this->post('/submit', [])->assertSessionHasErrors(['nama', 'lokasi', 'deskripsi']);
    }

    public function test_register_creates_hashed_account_and_logs_in(): void
    {
        $this->post('/register', [
            'name' => 'Petugas Baru',
            'email' => 'baru@example.com',
            'password' => 'rahasia123',
            'password_confirmation' => 'rahasia123',
        ])->assertRedirect(route('laporan.index'));

        $this->assertAuthenticated();
        $user = User::where('email', 'baru@example.com')->firstOrFail();
        $this->assertNotSame('rahasia123', $user->password);
        $this->assertTrue(Hash::check('rahasia123', $user->password));
    }

    public function test_register_validation_errors(): void
    {
        User::factory()->create(['email' => 'ada@example.com']);

        $this->post('/register', [
            'name' => '',
            'email' => 'ada@example.com',
            'password' => 'pendek',
            'password_confirmation' => 'beda',
        ])->assertSessionHasErrors(['name', 'email', 'password']);

        $this->assertGuest();
    }

    public function test_login_success_and_wrong_password(): void
    {
        $user = User::factory()->create(['password' => Hash::make('rahasia123')]);

        $this->post('/login', ['email' => $user->email, 'password' => 'salah'])
            ->assertSessionHasErrors('email');
        $this->assertGuest();

        $this->post('/login', ['email' => $user->email, 'password' => 'rahasia123'])
            ->assertRedirect(route('laporan.index'));
        $this->assertAuthenticatedAs($user);
    }

    public function test_logged_in_user_can_see_reports_and_profile_then_logout(): void
    {
        $user = User::factory()->create();
        Laporan::create(['nama' => 'Andi', 'lokasi' => 'Rancaekek', 'deskripsi' => 'Jalan terendam']);

        $this->actingAs($user)->get('/laporan')->assertOk()->assertSee('Rancaekek');
        $this->actingAs($user)->get('/profil')->assertOk()->assertSee($user->email);

        $this->post('/logout')->assertRedirect(route('form'));
        $this->assertGuest();
        $this->get('/laporan')->assertRedirect(route('login'));
    }

    public function test_logged_in_user_is_redirected_away_from_login_page(): void
    {
        $this->actingAs(User::factory()->create())->get('/login')->assertRedirect(route('laporan.index'));
    }

    public function test_seeder_creates_petugas_with_hashed_passwords_and_admin_can_login(): void
    {
        $this->seed(PetugasSeeder::class);
        $this->seed(PetugasSeeder::class); // aman dijalankan dua kali

        $this->assertGreaterThanOrEqual(6, User::count());

        foreach (User::all() as $user) {
            $this->assertStringStartsWith('$2y$', $user->password);
        }

        $this->post('/login', ['email' => 'admin@bpbd-bandung.go.id', 'password' => 'admin12345'])
            ->assertRedirect(route('laporan.index'));
        $this->assertAuthenticated();
    }
}
