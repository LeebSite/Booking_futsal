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
        <form action="#" method="POST" class="space-y-6">
            <div>
                <label class="block text-gray-700">Nama Lengkap</label>
                <input type="text" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-indigo-500" placeholder="Masukkan nama lengkap">
            </div>
            <div>
                <label class="block text-gray-700">Username</label>
                <input type="text" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-indigo-500" placeholder="Masukkan username">
            </div>
            <div>
                <label class="block text-gray-700">Email</label>
                <input type="email" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-indigo-500" placeholder="Masukkan email">
            </div>
            <div>
                <label class="block text-gray-700">No HP</label>
                <input type="text" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-indigo-500" placeholder="Masukkan no HP">
            </div>
            <div>
                <label class="block text-gray-700">Tanggal Lahir</label>
                <input type="date" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-indigo-500">
            </div>
            <div>
                <label class="block text-gray-700">Password</label>
                <input type="password" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-indigo-500" placeholder="Masukkan password">
            </div>
            <div>
                <button type="submit" class="w-full bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700">Daftar</button>
            </div>
        </form>
        <div class="text-center mt-4">
            <p class="text-sm text-gray-600">
                Sudah punya akun? 
                <a href="/masuk" class="font-medium text-indigo-600 hover:text-indigo-500">Masuk</a>
            </p>
        </div>
    </div>
</body>
</html>
