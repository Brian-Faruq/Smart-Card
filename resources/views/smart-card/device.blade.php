<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaksi Device - RFID</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">
    <div class="max-w-4xl mx-auto">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-indigo-900">Peminjaman & Pengembalian Device (RFID)</h1>
            <div class="flex gap-2">
                <a href="{{ route('transaksi.device.history') }}" class="bg-gray-700 hover:bg-gray-800 text-white font-bold py-2 px-4 rounded-lg text-sm">Riwayat Log</a>
                <a href="{{ route('transaksi.device.register') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded-lg text-sm">Daftar Kartu Baru</a>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded-lg text-sm">Logout</button>
                </form>
            </div>
        </div>

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg mb-4">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg mb-4">{{ session('error') }}</div>
        @endif

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Form Tap RFID -->
            <div class="bg-white p-6 rounded-2xl shadow-md border h-fit">
                <h2 class="text-lg font-semibold text-gray-800 mb-4">Scan Kartu RFID</h2>
                <form action="{{ route('smart-card.rfid') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">UID Kartu RFID:</label>
                        <input type="text" name="rfid_uid" placeholder="Tempelkan kartu RFID..." class="w-full px-4 py-3 border rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-400" autofocus required>
                    </div>
                    <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-3 px-4 rounded-xl">Proses Tap RFID</button>
                </form>
                <p class="text-xs text-gray-500 mt-4">* Tap sekali untuk <b>Pinjam</b>, tap sekali lagi dengan kartu yang sama untuk <b>Kembalikan</b>.</p>
            </div>

            <!-- Daftar Santri yang Sedang Meminjam -->
            <div class="bg-white p-6 rounded-2xl shadow-md border">
                <h2 class="text-lg font-semibold text-gray-800 mb-4">Device yang Sedang Dipinjam</h2>
                
                @php
                    $peminjamans = \App\Models\PeminjamanDevice::with('santri')->where('status', 'dipinjam')->latest()->get();
                @endphp

                @if($peminjamans->isEmpty())
                    <p class="text-sm text-gray-400 italic">Tidak ada device yang sedang dipinjam saat ini.</p>
                @else
                    <div class="space-y-3">
                        @foreach($peminjamans as $p)
                            <div class="p-3 bg-indigo-50 border border-indigo-100 rounded-xl flex justify-between items-center">
                                <div>
                                    <p class="font-bold text-gray-800 text-sm">{{ $p->santri->nama ?? 'Santri Tidak Dikenal' }}</p>
                                    <p class="text-xs text-gray-500">Kelas: {{ $p->santri->kelas ?? '-' }}</p>
                                    <p class="text-xs text-indigo-600 mt-1">Ambil: {{ $p->waktu_ambil }}</p>
                                </div>
                                <span class="px-2.5 py-1 bg-yellow-100 text-yellow-800 text-xs font-semibold rounded-full">Dipinjam</span>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
</body>
</html>