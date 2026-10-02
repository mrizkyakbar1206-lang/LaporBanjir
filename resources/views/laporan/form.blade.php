@extends('layouts.app')
@section('title', 'Form Laporan')
@section('content')
    <h2 class="text-2xl font-bold text-blue-800 mb-4">Input Laporan Banjir</h2>

    @if ($errors->any())
        <x-alert type="error" :message="$errors->first()" />
    @endif

    <div class="card">
        <form action="{{ route('laporan.submit') }}" method="POST" class="flex flex-col gap-3">
            @csrf
            <div>
                <label for="nama" class="text-blue-900 font-medium">Nama Pelapor:</label>
                <input type="text" id="nama" name="nama" value="{{ old('nama') }}" required
                    class="w-full mt-1 border border-blue-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>

            <div>
                <label for="lokasi" class="text-blue-900 font-medium">Lokasi Kejadian:</label>
                <input type="text" id="lokasi" name="lokasi" value="{{ old('lokasi') }}" required
                    class="w-full mt-1 border border-blue-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>

            <div>
                <label for="tinggi_air" class="text-blue-900 font-medium">Tinggi Genangan Air (cm):</label>
                <input type="number" id="tinggi_air" name="tinggi_air" min="0" value="{{ old('tinggi_air') }}" required
                    class="w-full mt-1 border border-blue-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>

            <button type="submit"
                class="bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-md p-2 mt-2 transition">
                Kirim Laporan
            </button>
        </form>
    </div>
@endsection
