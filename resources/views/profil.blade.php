@extends('layouts.app')

@section('title', 'Profil Petugas - LaporBanjir')

@section('content')
<div class="max-w-md mx-auto">
    <h2 class="text-2xl font-bold text-blue-800 text-center mb-4">Profil Petugas</h2>

    <div class="bg-white border border-blue-300 rounded-lg shadow-md p-5 flex flex-col gap-2">
        <p><strong class="text-blue-900">Nama:</strong> {{ Auth::user()->name }}</p>
        <p><strong class="text-blue-900">Email:</strong> {{ Auth::user()->email }}</p>
        <p>
            <strong class="text-blue-900">Akun dibuat:</strong>
            {{ Auth::user()->created_at->format('d/m/Y H:i') }}
            ({{ Auth::user()->created_at->diffForHumans() }})
        </p>
    </div>
</div>
@endsection
