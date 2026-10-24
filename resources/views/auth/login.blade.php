@extends('layouts.app')

@section('title', 'Login Petugas - LaporBanjir')

@section('content')
<div class="max-w-md mx-auto">
    <h2 class="text-2xl font-bold text-blue-800 text-center mb-4">Login Petugas BPBD</h2>

    <div class="bg-white border border-blue-300 rounded-lg shadow-md p-5">
        <form method="POST" action="{{ route('login') }}" class="flex flex-col gap-3">
            @csrf

            <div>
                <label for="email" class="text-blue-900 font-medium">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}"
                    required autofocus autocomplete="email"
                    class="w-full mt-1 border rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-400 @error('email') border-red-500 @else border-blue-300 @enderror">
                @error('email')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="password" class="text-blue-900 font-medium">Password</label>
                <input id="password" type="password" name="password" required autocomplete="current-password"
                    class="w-full mt-1 border rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-400 @error('password') border-red-500 @else border-blue-300 @enderror">
                @error('password')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <label class="flex items-center gap-2 text-sm">
                <input type="checkbox" name="remember" value="1" {{ old('remember') ? 'checked' : '' }}>
                Ingat saya
            </label>

            <button type="submit"
                class="bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-md p-2 transition">
                Login
            </button>

            <p class="text-sm text-center">
                Belum punya akun?
                <a href="{{ route('register') }}" class="text-blue-700 underline">Register</a>
            </p>
        </form>
    </div>
</div>
@endsection
