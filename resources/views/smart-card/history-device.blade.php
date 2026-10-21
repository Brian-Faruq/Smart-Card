<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Peminjaman Device</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">
    <div class="max-w-5xl mx-auto">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-indigo-900">Riwayat Peminjaman & Pengembalian Device</h1>
            <a href="{{ route('transaksi.device') }}" class="text-sm bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded-lg">&larr; Kembali</a>
        </div>

        <div class="bg-white rounded-2xl shadow-md border overflow-hidden">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-indigo-50 border-b text-indigo-900 text-sm font-bold">
                        <th class="p-4">No</th>
                        <th class="p-4">Nama Santri</th>
                        <th class="p-4">Kelas</th>
                        <th class="p-4">Waktu Ambil</th>
                        <th class="p-4">Waktu Kembali</th>
                        <th class="p-4">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y text-sm text-gray-700">
                    @forelse($riwayats as $index => $row)
                        <tr class="hover:bg-gray-50">
                            <td class="p-4 font-bold">{{ $index + 1 }}</td>
                            <td class="p-4 font-semibold">{{ $row->santri->nama ?? '-' }}</td>
                            <td class="p-4">{{ $row->santri->kelas ?? '-' }}</td>
                            <td class="p-4 text-gray-600">{{ $row->waktu_ambil }}</td>
                            <td class="p-4 text-gray-600">{{ $row->waktu_kembali ?? '-' }}</td>
                            <td class="p-4">
                                @if($row->status === 'dipinjam')
                                    <span class="px-3 py-1 bg-yellow-100 text-yellow-800 rounded-full text-xs font-bold">Dipinjam</span>
                                @else
                                    <span class="px-3 py-1 bg-green-100 text-green-800 rounded-full text-xs font-bold">Dikembalikan</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="p-6 text-center text-gray-400 italic">Belum ada riwayat peminjaman device.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>