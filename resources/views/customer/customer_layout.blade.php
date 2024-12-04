<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Dashboard - Andi's Futsal</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen">

    <!-- Navbar -->
    <div class="bg-indigo-600 p-4 shadow-md">
        <div class="container mx-auto flex justify-between items-center">
            <div class="flex items-center space-x-4">
                <img src="https://via.placeholder.com/50" alt="Logo" class="w-10 h-10 rounded-full">
                <a href="/booking" class="text-white text-lg font-semibold hover:text-indigo-300">Pemesanan</a>
                <a href="/riwayat" class="text-white text-lg font-semibold hover:text-indigo-300">Riwayat</a>
            </div>
            <div class="flex items-center space-x-4">
                <div class="flex items-center space-x-2">
                    <img src="https://via.placeholder.com/30" alt="User" class="w-8 h-8 rounded-full">
                    <span class="text-white font-semibold">User</span>
                </div>
                <a href="/masuk" class="text-white hover:text-indigo-300">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container mx-auto mt-8 px-4">
        @yield('content') <!-- This is where the page content will be inserted -->
    </div>

</body>

</html>
