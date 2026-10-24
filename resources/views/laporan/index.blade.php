@extends('layouts.app')

@section('title', 'Daftar Laporan - LaporBanjir')

@section('content')
<h2 class="text-2xl font-bold text-blue-800 mb-1">Daftar Laporan Banjir</h2>
<p class="text-sm text-blue-700 mb-4">
    Masuk sebagai {{ Auth::user()->name }} &middot; {{ $laporans->total() }} laporan
</p>

<div class="bg-white border border-blue-300 rounded-lg shadow-md overflow-x-auto">
    <table class="w-full text-left text-sm">
        <thead class="bg-blue-100 text-blue-900">
            <tr>
                <th class="px-4 py-2">#</th>
                <th class="px-4 py-2">Pelapor</th>
                <th class="px-4 py-2">Lokasi</th>
                <th class="px-4 py-2">Deskripsi</th>
                <th class="px-4 py-2">Waktu</th>
                <th class="px-4 py-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($laporans as $laporan)
                <tr class="border-t border-blue-100 align-top">
                    <td class="px-4 py-2">{{ $laporans->firstItem() + $loop->index }}</td>
                    <td class="px-4 py-2">{{ $laporan->nama }}</td>
                    <td class="px-4 py-2">{{ $laporan->lokasi }}</td>
                    <td class="px-4 py-2">{{ $laporan->deskripsi }}</td>
                    <td class="px-4 py-2 whitespace-nowrap">{{ $laporan->created_at->format('d/m/Y H:i') }}</td>
                    <td class="px-4 py-2">
                        <form method="POST" action="{{ route('laporan.destroy', $laporan) }}"
                            onsubmit="return confirm('Hapus laporan ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-800">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="px-4 py-6 text-center text-blue-700">Belum ada laporan masuk.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="mt-4">
    {{ $laporans->links() }}
</div>
@endsection
