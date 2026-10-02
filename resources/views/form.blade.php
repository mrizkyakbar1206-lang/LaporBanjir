<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>Form Laporan LaporBanjir</title>
</head>
<body class="bg-sky-50 min-h-screen flex flex-col items-center justify-center gap-4">
    <h2 class="text-2xl font-bold text-blue-800">Input Laporan Banjir</h2>

    <div class="bg-white border border-blue-300 rounded-lg shadow-md p-5 w-80">
        <form action="/submit" method="POST" class="flex flex-col gap-3">
            @csrf
            <div>
                <label for="nama" class="text-blue-900 font-medium">Nama:</label>
                <input type="text" id="nama" name="nama" required
                    class="w-full mt-1 border border-blue-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>

            <div>
                <label for="alamat" class="text-blue-900 font-medium">Lokasi:</label>
                <input type="text" id="alamat" name="alamat" required
                    class="w-full mt-1 border border-blue-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>

            <div>
                <label for="data" class="text-blue-900 font-medium">Deskripsi:</label>
                <textarea id="data" name="data" required
                    class="w-full mt-1 border border-blue-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-400"></textarea>
            </div>

            <button type="submit"
                class="bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-md p-2 mt-2 transition">
                Submit
            </button>
        </form>
    </div>
</body>
</html>

