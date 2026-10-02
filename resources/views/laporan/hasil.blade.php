@extends('layouts.app')
@section('title', 'Konfirmasi Laporan')
@section('content')
    <h2 class="text-2xl font-bold text-blue-800 mb-4">Konfirmasi Laporan</h2>

    <x-alert type="success" message="Laporan banjir berhasil dikirim." />

    @include('partials.laporan-card', ['laporan' => $laporan])

    <a href="{{ route('laporan.index') }}"
        class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-md px-4 py-2 transition">
        Lihat Daftar Laporan
    </a>
@endsection
