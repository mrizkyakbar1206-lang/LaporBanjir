<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | LaporBanjir</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <style>
        .card { border: 1px solid #93c5fd; border-radius: 8px; padding: 16px; background: #fff; box-shadow: 0 1px 3px rgba(0,0,0,.1); margin-bottom: 12px; }
    </style>
</head>
<body class="bg-sky-50 min-h-screen flex flex-col">
    <header class="bg-blue-800 text-white p-4 text-center">
        <h1 class="text-2xl font-bold">LaporBanjir</h1>
        <p class="text-sm text-blue-200">BPBD Kabupaten Bandung</p>
        <nav class="mt-2 flex justify-center gap-6">
            <a href="{{ route('laporan.index') }}" class="hover:underline">Daftar Laporan</a>
            <a href="{{ route('laporan.form') }}" class="hover:underline">Buat Laporan</a>
        </nav>
    </header>

    <main class="flex-1 w-full max-w-xl mx-auto p-5">
        @yield('content')
    </main>

    <footer class="bg-blue-800 text-white p-3 text-center text-sm">
        &copy; 2026 LaporBanjir - Muhammad Rizky Akbar
    </footer>
</body>
</html>
