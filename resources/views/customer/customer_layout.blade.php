<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Customer Dashboard - Andi\'s Futsal')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/global.css') }}">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            50: '#f0fdf4',
                            100: '#dcfce7',
                            200: '#bbf7d0',
                            300: '#86efac',
                            400: '#4ade80',
                            500: '#10b981',
                            600: '#059669',
                            700: '#047857',
                            800: '#065f46',
                            900: '#064e3b',
                        }
                    }
                }
            }
        }
    </script>
    <style>
        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            background: linear-gradient(135deg, #f0fdf4 0%, #ecfdf5 100%);
            min-height: 100vh;
        }

        .glass-effect {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .nav-link {
            position: relative;
            transition: all 0.3s ease;
        }

        .nav-link:hover {
            transform: translateY(-1px);
        }

        .nav-link.active {
            background: rgba(255, 255, 255, 0.2);
            border-radius: 8px;
        }

        .card-hover {
            transition: all 0.3s ease;
        }

        .card-hover:hover {
            transform: translateY(-4px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }
    </style>
</head>

<body class="min-h-screen">
    @include('components.loading-screen')

    <!-- Navbar -->
    <nav class="glass-effect shadow-lg fixed w-full top-0 z-50 border-b border-primary-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex-shrink-0 flex items-center">
                    <div class="flex items-center space-x-3">
                        <div class="w-8 h-8 bg-primary-500 rounded-lg flex items-center justify-center">
                            <i class="fas fa-futbol text-white text-sm"></i>
                        </div>
                        <a href="/" class="text-xl font-bold text-primary-800">
                            Andi's Futsal
                        </a>
                    </div>
                </div>

                <!-- Desktop Menu -->
                <div class="hidden md:flex items-center space-x-1">
                    <a href="/customer/beranda" class="nav-link text-primary-700 hover:text-primary-800 px-4 py-2 rounded-lg text-sm font-medium {{ request()->is('customer/beranda') ? 'active' : '' }}">
                        <i class="fas fa-home mr-2"></i>Beranda
                    </a>
                    <a href="/customer/bookinglap" class="nav-link text-primary-700 hover:text-primary-800 px-4 py-2 rounded-lg text-sm font-medium {{ request()->is('customer/bookinglap*') ? 'active' : '' }}">
                        <i class="fas fa-calendar-plus mr-2"></i>Booking
                    </a>
                    <a href="/riwayat" class="nav-link text-primary-700 hover:text-primary-800 px-4 py-2 rounded-lg text-sm font-medium {{ request()->is('riwayat*') ? 'active' : '' }}">
                        <i class="fas fa-history mr-2"></i>Riwayat
                    </a>
                    <a href="/profil" class="nav-link text-primary-700 hover:text-primary-800 px-4 py-2 rounded-lg text-sm font-medium {{ request()->is('profil*') ? 'active' : '' }}">
                        <i class="fas fa-user mr-2"></i>Profil
                    </a>
                    <div class="ml-4 flex items-center space-x-3">
                        <div class="flex items-center space-x-2 text-primary-700">
                            <div class="w-8 h-8 bg-primary-100 rounded-full flex items-center justify-center">
                                <i class="fas fa-user text-primary-600 text-xs"></i>
                            </div>
                            <span class="text-sm font-medium">{{ Auth::user()->nama ?? 'Customer' }}</span>
                        </div>
                        <button onclick="document.getElementById('logout-form').submit()"
                                class="px-4 py-2 rounded-lg text-sm font-medium text-white bg-primary-500 hover:bg-primary-600 transition-colors duration-200">
                            <i class="fas fa-sign-out-alt mr-2"></i>Logout
                        </button>
                    </div>
                </div>

                <!-- Mobile Hamburger Menu -->
                <div class="flex md:hidden items-center">
                    <button id="menu-toggle" class="text-primary-700 focus:outline-none p-2 rounded-lg hover:bg-primary-100 transition-colors duration-200">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden md:hidden glass-effect border-t border-primary-200">
            <div class="px-4 py-3 space-y-1">
                <a href="/customer/beranda" class="flex items-center text-primary-700 hover:text-primary-800 hover:bg-primary-50 px-3 py-2 rounded-lg text-sm font-medium transition-colors duration-200 {{ request()->is('customer/beranda') ? 'bg-primary-100' : '' }}">
                    <i class="fas fa-home mr-3 w-4"></i>Beranda
                </a>
                <a href="/customer/bookinglap" class="flex items-center text-primary-700 hover:text-primary-800 hover:bg-primary-50 px-3 py-2 rounded-lg text-sm font-medium transition-colors duration-200 {{ request()->is('customer/bookinglap*') ? 'bg-primary-100' : '' }}">
                    <i class="fas fa-calendar-plus mr-3 w-4"></i>Booking
                </a>
                <a href="/riwayat" class="flex items-center text-primary-700 hover:text-primary-800 hover:bg-primary-50 px-3 py-2 rounded-lg text-sm font-medium transition-colors duration-200 {{ request()->is('riwayat*') ? 'bg-primary-100' : '' }}">
                    <i class="fas fa-history mr-3 w-4"></i>Riwayat
                </a>
                <a href="/profil" class="flex items-center text-primary-700 hover:text-primary-800 hover:bg-primary-50 px-3 py-2 rounded-lg text-sm font-medium transition-colors duration-200 {{ request()->is('profil*') ? 'bg-primary-100' : '' }}">
                    <i class="fas fa-user mr-3 w-4"></i>Profil
                </a>
                <div class="border-t border-primary-200 pt-3 mt-3">
                    <div class="flex items-center px-3 py-2 text-primary-700">
                        <div class="w-8 h-8 bg-primary-100 rounded-full flex items-center justify-center mr-3">
                            <i class="fas fa-user text-primary-600 text-xs"></i>
                        </div>
                        <span class="text-sm font-medium">{{ Auth::user()->nama ?? 'Customer' }}</span>
                    </div>
                    <button onclick="document.getElementById('logout-form-mobile').submit()"
                            class="w-full flex items-center text-red-600 hover:text-red-700 hover:bg-red-50 px-3 py-2 rounded-lg text-sm font-medium transition-colors duration-200">
                        <i class="fas fa-sign-out-alt mr-3 w-4"></i>Logout
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="pt-20 pb-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            @yield('content')
        </div>
    </div>

    <!-- Logout Forms -->
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
        @csrf
    </form>
    <form id="logout-form-mobile" action="{{ route('logout') }}" method="POST" class="hidden">
        @csrf
    </form>

    <!-- JavaScript -->
    <script>
        // Show loading
        showLoading();

        // Hide loading when page is ready
        document.addEventListener('DOMContentLoaded', function() {
            hideLoading();
        });

        // Mobile menu toggle
        const toggleButton = document.getElementById('menu-toggle');
        const mobileMenu = document.getElementById('mobile-menu');

        toggleButton.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');

            // Animate hamburger icon
            const icon = toggleButton.querySelector('i');
            if (mobileMenu.classList.contains('hidden')) {
                icon.classList.remove('fa-times');
                icon.classList.add('fa-bars');
            } else {
                icon.classList.remove('fa-bars');
                icon.classList.add('fa-times');
            }
        });

        // Close mobile menu when clicking outside
        document.addEventListener('click', function(event) {
            if (!toggleButton.contains(event.target) && !mobileMenu.contains(event.target)) {
                mobileMenu.classList.add('hidden');
                const icon = toggleButton.querySelector('i');
                icon.classList.remove('fa-times');
                icon.classList.add('fa-bars');
            }
        });

        // Close mobile menu on window resize
        window.addEventListener('resize', function() {
            if (window.innerWidth >= 768) {
                mobileMenu.classList.add('hidden');
                const icon = toggleButton.querySelector('i');
                icon.classList.remove('fa-times');
                icon.classList.add('fa-bars');
            }
        });
    </script>
</body>

</html>
