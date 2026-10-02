<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>Hasil Laporan LaporBanjir</title>
</head>
<body class="bg-sky-50 min-h-screen flex flex-col items-center justify-center gap-4">
    <h2 class="text-2xl font-bold text-blue-800">Laporan anda sudah di-Laporkan!</h2>

    <div class="bg-white border border-blue-300 rounded-lg shadow-md p-5 w-80 flex flex-col gap-2">
        <p><strong class="text-blue-900">Nama:</strong> {{ $nama }}</p>
        <p><strong class="text-blue-900">Lokasi:</strong> {{ $alamat }}</p>
        <p><strong class="text-blue-900">Deskripsi:</strong> {{ $data }}</p>
    </div>

    <button onclick="window.location.href='/'"
        class="bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-md px-4 py-2 transition">
        Kembali
    </button>
</body>
</html>

