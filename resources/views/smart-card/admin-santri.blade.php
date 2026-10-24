<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Admin - Master Santri</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">
    <div class="max-w-6xl mx-auto">
        <div class="flex justify-between items-center mb-6">
            <div>
                <h1 class="text-2xl font-bold text-blue-900">Dashboard Data Admin</h1>
                <p class="text-sm text-gray-500">Monitoring Data Master Santri, Saldo Kantin, dan Kartu Terdaftar</p>
            </div>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded-lg text-sm">Logout</button>
            </form>
        </div>

        <div class="bg-white rounded-2xl shadow-md border overflow-hidden">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-blue-50 border-b text-blue-900 text-sm font-bold">
                        <th class="p-4">No</th>
                        <th class="p-4">Nama Santri</th>
                        <th class="p-4">Kelas</th>
                        <th class="p-4">Saldo SIMART</th>
                        <th class="p-4">UID RFID</th>
                        <th class="p-4">Kode Barcode</th>
                    </tr>
                </thead>
                <tbody class="divide-y text-sm text-gray-700">
                    @forelse($santris as $index => $santri)
                        <tr class="hover:bg-gray-50">
                            <td class="p-4 font-bold">{{ $index + 1 }}</td>
                            <td class="p-4 font-semibold text-gray-900">{{ $santri->nama }}</td>
                            <td class="p-4">{{ $santri->kelas }}</td>
                            <td class="p-4 font-bold text-green-700">Rp {{ number_format($santri->saldo, 0, ',', '.') }}</td>
                            <td class="p-4 font-mono text-xs">
                                {{ $santri->rfid_uid ?? 'Belum Terdaftar' }}
                            </td>
                            <td class="p-4 font-mono text-xs">
                                {{ $santri->barcode_code ?? 'Belum Terdaftar' }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="p-6 text-center text-gray-400 italic">Belum ada data santri di database.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>