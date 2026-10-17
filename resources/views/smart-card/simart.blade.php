<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kasir SIMART - Barcode</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">
    <div class="max-w-xl mx-auto">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-green-900">Kasir SIMART (Kantin)</h1>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="text-sm bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded-lg">Logout</button>
            </form>
        </div>

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg mb-4">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg mb-4">
                {{ session('error') }}
            </div>
        @endif

        <div class="bg-white p-6 rounded-2xl shadow-md border">
            <form action="{{ route('smart-card.barcode') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Kode Barcode Santri:</label>
                    <input type="text" name="barcode_code" placeholder="Scan barcode..." class="w-full px-4 py-3 border rounded-xl focus:outline-none focus:ring-2 focus:ring-green-400" autofocus required>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Total Belanja (Rp):</label>
                    <input type="number" name="total_belanja" placeholder="Contoh: 10000" class="w-full px-4 py-3 border rounded-xl focus:outline-none focus:ring-2 focus:ring-green-400" required>
                </div>
                <button type="submit" class="w-full bg-green-600 hover:bg-green-700 text-white font-bold py-3 px-4 rounded-xl">Bayar via SIMART</button>
            </form>
            <p class="text-xs text-gray-500 mt-4">Uji coba Barcode: <span class="font-mono font-bold">BARCODE-001</span> / <span class="font-mono font-bold">BARCODE-002</span></p>
        </div>
    </div>
</body>
</html>