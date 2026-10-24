<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>@yield('title', 'LaporBanjir')</title>
</head>
<body class="bg-sky-50 min-h-screen text-blue-950">
    <nav class="bg-white border-b border-blue-200 shadow-sm">
        <div class="max-w-5xl mx-auto px-4 py-3 flex flex-wrap items-center justify-between gap-3">
            <a href="{{ route('form') }}" class="text-xl font-bold text-blue-800">LaporBanjir</a>

            <ul class="flex flex-wrap items-center gap-4 text-sm font-medium">
                <li><a href="{{ route('form') }}" class="text-blue-700 hover:text-blue-900">Form Laporan</a></li>

                @auth
                    <li><a href="{{ route('laporan.index') }}" class="text-blue-700 hover:text-blue-900">Daftar Laporan</a></li>
                    <li><a href="{{ route('profil') }}" class="text-blue-700 hover:text-blue-900">Profil Petugas</a></li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="text-red-600 hover:text-red-800 font-medium">Logout</button>
                        </form>
                    </li>
                @else
                    <li><a href="{{ route('login') }}" class="text-blue-700 hover:text-blue-900">Login</a></li>
                    <li>
                        <a href="{{ route('register') }}"
                            class="bg-blue-600 hover:bg-blue-700 text-white rounded-md px-3 py-1.5 transition">Register</a>
                    </li>
                @endauth
            </ul>
        </div>
    </nav>

    <main class="max-w-5xl mx-auto px-4 py-8">
        @if (session('success'))
            <div class="mb-4 rounded-md border border-green-300 bg-green-50 text-green-800 px-4 py-3">
                {{ session('success') }}
            </div>
        @endif

        @yield('content')
    </main>
</body>
</html>
