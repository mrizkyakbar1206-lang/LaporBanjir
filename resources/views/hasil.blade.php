@extends('layouts.app')

@section('title', 'Hasil Laporan LaporBanjir')

@section('content')
<div class="max-w-md mx-auto flex flex-col items-center gap-4">
    <h2 class="text-2xl font-bold text-blue-800 text-center">Laporan anda sudah di-Laporkan!</h2>

    <div class="bg-white border border-blue-300 rounded-lg shadow-md p-5 w-full flex flex-col gap-2">
        <p><strong class="text-blue-900">Nama:</strong> {{ $laporan->nama }}</p>
        <p><strong class="text-blue-900">Lokasi:</strong> {{ $laporan->lokasi }}</p>
        <p><strong class="text-blue-900">Deskripsi:</strong> {{ $laporan->deskripsi }}</p>
    </div>

    <a href="{{ route('form') }}"
        class="bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-md px-4 py-2 transition">
        Kembali
    </a>
</div>
@endsection
