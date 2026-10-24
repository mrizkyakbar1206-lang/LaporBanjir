@extends('layouts.app')

@section('title', 'Form Laporan LaporBanjir')

@section('content')
<div class="max-w-md mx-auto flex flex-col items-center gap-4">
    <h2 class="text-2xl font-bold text-blue-800">Input Laporan Banjir</h2>

    <div class="bg-white border border-blue-300 rounded-lg shadow-md p-5 w-full">
        <form action="{{ route('submit') }}" method="POST" class="flex flex-col gap-3">
            @csrf

            <div>
                <label for="nama" class="text-blue-900 font-medium">Nama:</label>
                <input type="text" id="nama" name="nama" value="{{ old('nama') }}" required
                    class="w-full mt-1 border border-blue-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
                @error('nama')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="lokasi" class="text-blue-900 font-medium">Lokasi:</label>
                <input type="text" id="lokasi" name="lokasi" value="{{ old('lokasi') }}" required
                    class="w-full mt-1 border border-blue-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
                @error('lokasi')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="deskripsi" class="text-blue-900 font-medium">Deskripsi:</label>
                <textarea id="deskripsi" name="deskripsi" required rows="4"
                    class="w-full mt-1 border border-blue-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-400">{{ old('deskripsi') }}</textarea>
                @error('deskripsi')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit"
                class="bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-md p-2 mt-2 transition">
                Submit
            </button>
        </form>
    </div>
</div>
@endsection
