<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PetugasSeeder extends Seeder
{
    public function run(): void
    {
        // Locale id_ID -> nama petugas berbahasa Indonesia
        $faker = Faker::create('id_ID');

        // 5 akun petugas dummy (password: "password", disimpan dalam bentuk hash)
        for ($i = 0; $i < 5; $i++) {
            DB::table('users')->insert([
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // 1 akun admin BPBD dengan email & password tetap.
        // updateOrInsert -> aman dijalankan berulang (tidak error Duplicate entry).
        DB::table('users')->updateOrInsert(
            ['email' => 'admin@bpbd-bandung.go.id'],
            [
                'name' => 'Admin BPBD Kabupaten Bandung',
                'email_verified_at' => now(),
                'password' => Hash::make('admin12345'),
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
    }
}
