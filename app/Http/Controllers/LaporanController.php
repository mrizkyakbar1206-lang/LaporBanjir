<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LaporanController extends Controller
{
    // Data dummy (tanpa database)
    private function dataLaporan(): array
    {
        return [
            ['nama' => 'Budi Santoso',  'lokasi' => 'Dayeuhkolot',  'tinggi_air' => 25, 'tanggal' => '2026-10-01'],
            ['nama' => 'Siti Rahayu',   'lokasi' => 'Baleendah',    'tinggi_air' => 50, 'tanggal' => '2026-10-01'],
            ['nama' => 'Agus Wijaya',   'lokasi' => 'Bojongsoang',  'tinggi_air' => 85, 'tanggal' => '2026-10-02'],
            ['nama' => 'Dewi Lestari',  'lokasi' => 'Majalaya',     'tinggi_air' => 30, 'tanggal' => '2026-10-02'],
            ['nama' => 'Rudi Hartono',  'lokasi' => 'Rancaekek',    'tinggi_air' => 70, 'tanggal' => '2026-10-02'],
        ];
    }

    // Halaman daftar laporan
    public function index()
    {
        $laporans = $this->dataLaporan();

        return view('laporan.index', compact('laporans'));
    }

    // Halaman form pelaporan
    public function create()
    {
        return view('laporan.form');
    }

    // Proses POST -> halaman konfirmasi
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama'       => 'required|string|max:100',
            'lokasi'     => 'required|string|max:150',
            'tinggi_air' => 'required|numeric|min:0',
        ]);

        $laporan = $validated;

        return view('laporan.hasil', compact('laporan'));
    }
}
