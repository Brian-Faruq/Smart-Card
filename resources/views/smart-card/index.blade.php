<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simulasi Smart Card Pesantren</title>
    <!-- Menggunakan CDN Tailwind CSS agar tampilannya langsung rapi -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">
    <div class="max-w-4xl mx-auto">
        <h1 class="text-3xl font-bold text-center mb-6 text-indigo-700">Simulasi Sistem Smart Card (RFID & SIMART)</h1>

        <!-- Notifikasi Pesan Sukses / Gagal -->
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                {{ session('error') }}
            </div>
        @endif

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Form Tap RFID (Peminjaman Device) -->
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-xl font-semibold mb-4 text-gray-800">1. Peminjaman Device (Tap RFID)</h2>
                <form action="{{ route('smart-card.rfid') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">UID Kartu RFID / Tap Alat:</label>
                        <input type="text" name="rfid_uid" placeholder="Tempelkan kartu atau ketik UID..." class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-indigo-300" autofocus required>
                    </div>
                    <button type="submit" class="w-full bg-indigo-600 text-white font-bold py-2 px-4 rounded-lg hover:bg-indigo-700">Proses Tap RFID</button>
                </form>
                <p class="text-xs text-gray-500 mt-2">Data uji coba UID: <span class="font-mono font-bold">1234567890</span> atau <span class="font-mono font-bold">0987654321</span></p>
            </div>

            <!-- Form Kasir SIMART (Scan Barcode) -->
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-xl font-semibold mb-4 text-gray-800">2. Kasir Kantin SIMART (Scan Barcode)</h2>
                <form action="{{ route('smart-card.barcode') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Kode Barcode Santri:</label>
                        <input type="text" name="barcode_code" placeholder="Scan barcode..." class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-indigo-300" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Total Belanja (Rp):</label>
                        <input type="number" name="total_belanja" placeholder="Contoh: 10000" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-indigo-300" required>
                    </div>
                    <button type="submit" class="w-full bg-green-600 text-white font-bold py-2 px-4 rounded-lg hover:bg-green-700">Bayar via SIMART</button>
                </form>
                <p class="text-xs text-gray-500 mt-2">Data uji coba Barcode: <span class="font-mono font-bold">BARCODE-001</span> atau <span class="font-mono font-bold">BARCODE-002</span></p>
            </div>
        </div>
    </div>
</body>
</html>