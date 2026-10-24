<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use Illuminate\Http\Request;

class DataController extends Controller
{
    // Halaman form pelaporan (publik, tanpa login)
    public function form()
    {
        return view('form');
    }

    // Menyimpan laporan warga ke database (publik, tanpa login)
    public function submit(Request $request)
    {
        $validated = $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'lokasi' => ['required', 'string', 'max:255'],
            'deskripsi' => ['required', 'string'],
        ]);

        $laporan = Laporan::create($validated);

        return view('hasil', compact('laporan'));
    }
}
