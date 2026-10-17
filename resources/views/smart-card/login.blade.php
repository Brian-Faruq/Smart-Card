<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - {{ strtoupper($type) }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center p-6">
    <div class="max-w-md w-full bg-white p-8 rounded-2xl shadow-xl border border-gray-100">
        <a href="{{ route('landing') }}" class="text-sm text-indigo-600 hover:underline mb-4 inline-block">&larr; Kembali ke Pilihan</a>
        
        <h2 class="text-2xl font-bold mb-2 text-gray-800">Login Operasional {{ strtoupper($type) }}</h2>
        <p class="text-sm text-gray-500 mb-6">Masukkan password petugas untuk melanjutkan.</p>

        @if(session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4 text-sm">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('login.process', $type) }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Password Petugas:</label>
                <input type="password" name="password" placeholder="Masukkan password..." class="w-full px-4 py-3 border rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-400" autofocus required>
            </div>

            <button type="submit" class="w-full py-3 px-4 rounded-xl font-bold text-white transition duration-200 {{ $type === 'device' ? 'bg-indigo-600 hover:bg-indigo-700' : 'bg-green-600 hover:bg-green-700' }}">
                Masuk ke Mode {{ strtoupper($type) }}
            </button>
        </form>

        <p class="text-xs text-gray-400 mt-6 text-center">
            * Password dummy: <br>
            Device: <span class="font-mono font-bold text-gray-600">device123</span> | SIMART: <span class="font-mono font-bold text-gray-600">simart123</span>
        </p>
    </div>
</body>
</html>