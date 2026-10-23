@extends('layouts.app')
@section('title', 'Daftar Laporan')
@section('content')
    <h2 class="text-2xl font-bold text-blue-800 mb-4">Daftar Laporan Banjir</h2>

    @forelse ($laporan as $laporan)
        @include('partials.laporan-card', ['laporan' => $laporan])
    @empty
        <p>Belum ada laporan banjir.</p>
    @endforelse
@endsection
