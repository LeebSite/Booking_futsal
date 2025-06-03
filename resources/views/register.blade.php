<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar - Andi's Futsal</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-gray-100 flex items-center justify-center">
    <div class="max-w-lg w-full bg-white p-10 rounded-xl shadow-md">
        <h2 class="text-3xl font-extrabold text-gray-900 text-center mb-8">Daftar Akun Baru</h2>
        <form action="{{ route('register.store') }}" method="POST" class="space-y-6">
            @csrf
            <div>
                <label for="nama" class="block text-gray-700">Nama Lengkap</label>
                <input type="text" id="nama" name="nama" value="{{ old('nama') }}" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-indigo-500 @error('nama') border-red-500 @enderror" placeholder="Masukkan nama lengkap">
                @error('nama')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="username" class="block text-gray-700">Username</label>
                <input type="text" id="username" name="username" value="{{ old('username') }}" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-indigo-500 @error('username') border-red-500 @enderror" placeholder="Masukkan username">
                @error('username')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="email" class="block text-gray-700">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-indigo-500 @error('email') border-red-500 @enderror" placeholder="Masukkan email">
                @error('email')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="no_hp" class="block text-gray-700">No HP</label>
                <input type="text" id="no_hp" name="no_hp" value="{{ old('no_hp') }}" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-indigo-500 @error('no_hp') border-red-500 @enderror" placeholder="Masukkan no HP">
                @error('no_hp')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="tanggal_lahir" class="block text-gray-700">Tanggal Lahir</label>
                <input type="date" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-indigo-500 @error('tanggal_lahir') border-red-500 @enderror">
                @error('tanggal_lahir')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="password" class="block text-gray-700">Password</label>
                <input type="password" id="password" name="password" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-indigo-500 @error('password') border-red-500 @enderror" placeholder="Masukkan password">
                @error('password')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <button type="submit" class="w-full bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700">Daftar</button>
            </div>
        </form>
        <div class="text-center mt-4">
            <p class="text-sm text-gray-600">
                Sudah punya akun? 
                <a href="{{ route('login') }}" class="font-medium text-indigo-600 hover:text-indigo-500">Masuk</a>
            </p>
        </div>
    </div>
</body>
</html>
