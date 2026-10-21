<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Transaksi SIMART</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">
    <div class="max-w-5xl mx-auto">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-green-900">Riwayat Transaksi Kantin SIMART</h1>
            <a href="{{ route('transaksi.simart') }}" class="text-sm bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded-lg">&larr; Kembali</a>
        </div>

        <div class="bg-white rounded-2xl shadow-md border overflow-hidden">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-green-50 border-b text-green-900 text-sm font-bold">
                        <th class="p-4">No</th>
                        <th class="p-4">Nama Santri</th>
                        <th class="p-4">Kelas</th>
                        <th class="p-4">Total Belanja</th>
                        <th class="p-4">Keterangan</th>
                        <th class="p-4">Waktu Transaksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y text-sm text-gray-700">
                    @forelse($riwayats as $index => $row)
                        <tr class="hover:bg-gray-50">
                            <td class="p-4 font-bold">{{ $index + 1 }}</td>
                            <td class="p-4 font-semibold">{{ $row->santri->nama ?? '-' }}</td>
                            <td class="p-4">{{ $row->santri->kelas ?? '-' }}</td>
                            <td class="p-4 font-bold text-green-700">Rp {{ number_format($row->total_belanja, 0, ',', '.') }}</td>
                            <td class="p-4">{{ $row->keterangan }}</td>
                            <td class="p-4 text-gray-600">{{ $row->created_at }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="p-6 text-center text-gray-400 italic">Belum ada riwayat transaksi kantin.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>