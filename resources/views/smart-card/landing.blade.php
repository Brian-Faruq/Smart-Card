<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Smart Card Pesantren</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center p-6">
    <div class="max-w-5xl w-full text-center">
        <h1 class="text-4xl font-extrabold text-indigo-900 mb-2">Pusat Layanan Smart Card</h1>
        <p class="text-gray-600 mb-10">Pilih jenis layanan yang ingin diakses:</p>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Tombol Layanan Device -->
            <a href="{{ route('login.form', 'device') }}" class="bg-white p-6 rounded-2xl shadow-lg border-2 border-indigo-100 hover:border-indigo-500 hover:shadow-2xl transition duration-300 transform hover:-translate-y-1 block text-center">
                <div class="w-14 h-14 bg-indigo-100 text-indigo-600 rounded-full flex items-center justify-center mx-auto mb-4 text-2xl">📱</div>
                <h2 class="text-xl font-bold text-gray-800 mb-2">Transaksi DEVICE</h2>
                <p class="text-xs text-gray-500">Peminjaman & Pengembalian Alat berbasis RFID</p>
            </a>

            <!-- Tombol Layanan SIMART -->
            <a href="{{ route('login.form', 'simart') }}" class="bg-white p-6 rounded-2xl shadow-lg border-2 border-green-100 hover:border-green-500 hover:shadow-2xl transition duration-300 transform hover:-translate-y-1 block text-center">
                <div class="w-14 h-14 bg-green-100 text-green-600 rounded-full flex items-center justify-center mx-auto mb-4 text-2xl">🛒</div>
                <h2 class="text-xl font-bold text-gray-800 mb-2">Transaksi SIMART</h2>
                <p class="text-xs text-gray-500">Kasir Pembayaran Kantin berbasis Barcode</p>
            </a>

            <!-- Tombol Data Admin -->
            <a href="{{ route('login.form', 'admin') }}" class="bg-white p-6 rounded-2xl shadow-lg border-2 border-blue-100 hover:border-blue-500 hover:shadow-2xl transition duration-300 transform hover:-translate-y-1 block text-center">
                <div class="w-14 h-14 bg-blue-100 text-blue-600 rounded-full flex items-center justify-center mx-auto mb-4 text-2xl">👥</div>
                <h2 class="text-xl font-bold text-gray-800 mb-2">Data Admin</h2>
                <p class="text-xs text-gray-500">Manajemen & Monitoring Data Master Santri</p>
            </a>
        </div>
    </div>
</body>
</html>