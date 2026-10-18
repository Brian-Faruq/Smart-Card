<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Barcode SIMART Baru</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">
    <div class="max-w-xl mx-auto">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-green-900">Registrasi Barcode SIMART Santri</h1>
            <a href="{{ route('transaksi.simart') }}" class="text-sm bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded-lg">&larr; Kembali</a>
        </div>

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg mb-4">{{ session('success') }}</div>
        @endif
        @if($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="bg-white p-6 rounded-2xl shadow-md border">
            <form action="{{ route('transaksi.simart.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Pilih Santri:</label>
                    <select name="santri_id" class="w-full px-4 py-3 border rounded-xl focus:outline-none focus:ring-2 focus:ring-green-400" required>
                        <option value="">-- Pilih Santri --</option>
                        @foreach($santris as $santri)
                            <option value="{{ $santri->id }}">{{ $santri->nama }} (Kelas: {{ $santri->kelas }})</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Kode Barcode Baru:</label>
                    <input type="text" name="barcode_code" placeholder="Scan barcode ke scanner atau ketik..." class="w-full px-4 py-3 border rounded-xl focus:outline-none focus:ring-2 focus:ring-green-400" required>
                </div>
                <button type="submit" class="w-full bg-green-600 hover:bg-green-700 text-white font-bold py-3 px-4 rounded-xl">Simpan Barcode Santri</button>
            </form>
        </div>
    </div>
</body>
</html>