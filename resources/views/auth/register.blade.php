@extends('layouts.app')

@section('title', 'Register Petugas - LaporBanjir')

@section('content')
<div class="max-w-md mx-auto">
    <h2 class="text-2xl font-bold text-blue-800 text-center mb-4">Register Petugas BPBD</h2>

    <div class="bg-white border border-blue-300 rounded-lg shadow-md p-5">
        <form method="POST" action="{{ route('register') }}" class="flex flex-col gap-3">
            @csrf

            <div>
                <label for="name" class="text-blue-900 font-medium">Nama</label>
                <input id="name" type="text" name="name" value="{{ old('name') }}"
                    required autofocus autocomplete="name"
                    class="w-full mt-1 border rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-400 @error('name') border-red-500 @else border-blue-300 @enderror">
                @error('name')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="email" class="text-blue-900 font-medium">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}"
                    required autocomplete="email"
                    class="w-full mt-1 border rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-400 @error('email') border-red-500 @else border-blue-300 @enderror">
                @error('email')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="password" class="text-blue-900 font-medium">Password</label>
                <input id="password" type="password" name="password" required autocomplete="new-password"
                    class="w-full mt-1 border rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-400 @error('password') border-red-500 @else border-blue-300 @enderror">
                <p class="text-xs text-blue-700 mt-1">Minimal 8 karakter.</p>
                @error('password')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="password_confirmation" class="text-blue-900 font-medium">Konfirmasi Password</label>
                <input id="password_confirmation" type="password" name="password_confirmation"
                    required autocomplete="new-password"
                    class="w-full mt-1 border border-blue-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>

            <button type="submit"
                class="bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-md p-2 transition">
                Register
            </button>

            <p class="text-sm text-center">
                Sudah punya akun?
                <a href="{{ route('login') }}" class="text-blue-700 underline">Login</a>
            </p>
        </form>
    </div>
</div>
@endsection
