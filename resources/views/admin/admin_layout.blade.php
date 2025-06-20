<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Beranda - Andi's Futsal</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/global.css') }}">
</head>
<body class="bg-gray-50 m-0 p-0">
    @include('components.loading-screen')
    <!-- Navbar -->
    <nav class="bg-emerald-600 shadow-md fixed w-full top-0 z-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center">
                    <a href="/" class="text-2xl font-bold text-white">
                        Andi's Futsal
                    </a>
                </div>

                <!-- Menu Links -->
                <div class="hidden md:flex items-center space-x-1">
                    <a href="/admin/beranda" class="text-white hover:bg-emerald-700 px-3 py-2 rounded-md text-sm font-semibold">Beranda</a>
                    <a href="/admin/lapangan" class="text-white hover:bg-emerald-700 px-3 py-2 rounded-md text-sm font-semibold">Lapangan</a>
                    <a href="/admin/booking" class="text-white hover:bg-emerald-700 px-3 py-2 rounded-md text-sm font-semibold">
                        Pesanan
                    </a>
                    <a href="/admin/laporan" class="text-white hover:bg-emerald-700 px-3 py-2 rounded-md text-sm font-semibold">Laporan</a>
                    <a href="/profil" class="text-white hover:bg-emerald-700 px-3 py-2 rounded-2xl text-sm font-medium"><i class="fas fa-user"></i></a>
                    <a href="#" onclick="document.getElementById('logout-form').submit()" class="ml-4 px-4 py-2 rounded-md text-sm font-semibold text-emerald-600 bg-white hover:bg-emerald-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-emerald-500">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>                    
                </div>

                <!-- Hamburger Menu for Mobile -->
                <div class="flex md:hidden items-center">
                    <button id="menu-toggle" class="text-white focus:outline-none">
                        <i class="fas fa-bars text-2xl"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden md:hidden bg-emerald-600 mb-2">
            <a href="/admin/beranda" class="block text-white px-4 py-2 text-sm hover:bg-emerald-700">Beranda</a>
            <a href="/admin/lapangan" class="block text-white px-4 py-2 text-sm hover:bg-emerald-700">Lapangan</a>
            <a href="/admin/booking" class="text-white hover:bg-emerald-700 px-3 py-2 rounded-md text-sm font-semibold">
                Pesanan
            </a>            
            <a href="/admin/laporan" class="block text-white px-4 py-2 text-sm hover:bg-emerald-700">Laporan</a>
            <a href="#" onclick="document.getElementById('logout-form').submit()" class="block px-4 py-1 text-red-700 hover:bg-emerald-700 font-bold">Logout</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf   
            </form>            
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container mx-auto mt-20 px-3">
        @yield('content')
    </div>

    <!-- JavaScript for Hamburger Menu Toggle -->
    <script>
        // Show loading
        showLoading();

        // Hide loading
        hideLoading();
        const toggleButton = document.getElementById('menu-toggle');
        const mobileMenu = document.getElementById('mobile-menu');
        
        toggleButton.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });
    </script>
</body>
</html>