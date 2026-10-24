<?php

namespace App\Http\Controllers;

use App\Models\Laporan;

class LaporanController extends Controller
{
    // Daftar laporan masuk (hanya petugas yang sudah login)
    public function index()
    {
        $laporans = Laporan::latest()->paginate(10);

        return view('laporan.index', compact('laporans'));
    }

    // Menghapus laporan (hanya petugas yang sudah login)
    public function destroy(Laporan $laporan)
    {
        $laporan->delete();

        return redirect()->route('laporan.index')
            ->with('success', 'Laporan berhasil dihapus.');
    }
}
