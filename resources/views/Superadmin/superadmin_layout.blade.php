<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Superadmin Dashboard - Andi\'s Futsal')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            50: '#eff6ff',
                            100: '#dbeafe',
                            200: '#bfdbfe',
                            300: '#93c5fd',
                            400: '#60a5fa',
                            500: '#3b82f6',
                            600: '#2563eb',
                            700: '#1d4ed8',
                            800: '#1e40af',
                            900: '#1e3a8a',
                        }
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-slate-50">
    @include('components.loading-screen')
    <div class="min-h-screen flex">
        <!-- Sidebar -->
        <div id="sidebar" class="w-64 bg-gradient-to-b from-primary-800 to-primary-900 text-white min-h-screen shadow-xl transition-transform transform -translate-x-full lg:translate-x-0 fixed lg:relative z-30">
            <!-- Logo & Title -->
            <div class="p-6 border-b border-primary-700">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-white/20 rounded-xl flex items-center justify-center">
                        <i class="fas fa-futbol text-white text-xl"></i>
                    </div>
                    <div>
                        <h1 class="text-lg font-bold">Andi's Futsal</h1>
                        <p class="text-primary-200 text-xs">Superadmin Panel</p>
                    </div>
                </div>
            </div>

            <!-- Navigation -->
            <nav class="mt-6 px-4">
                <div class="space-y-2">
                    <a href="{{ route('superadmin.beranda') }}"
                       class="flex items-center space-x-3 p-3 rounded-xl hover:bg-primary-700 transition-all duration-200 group {{ request()->routeIs('superadmin.beranda') ? 'bg-primary-700 shadow-lg' : '' }}">
                        <i class="fas fa-home text-lg group-hover:scale-110 transition-transform"></i>
                        <span class="font-medium">Dashboard</span>
                    </a>

                    <a href="{{ route('superadmin.users') }}"
                       class="flex items-center space-x-3 p-3 rounded-xl hover:bg-primary-700 transition-all duration-200 group {{ request()->routeIs('superadmin.users') ? 'bg-primary-700 shadow-lg' : '' }}">
                        <i class="fas fa-users text-lg group-hover:scale-110 transition-transform"></i>
                        <span class="font-medium">Kelola Pengguna</span>
                    </a>

                    <a href="#"
                       class="flex items-center space-x-3 p-3 rounded-xl hover:bg-primary-700 transition-all duration-200 group">
                        <i class="fas fa-chart-bar text-lg group-hover:scale-110 transition-transform"></i>
                        <span class="font-medium">Laporan</span>
                    </a>

                    <a href="#"
                       class="flex items-center space-x-3 p-3 rounded-xl hover:bg-primary-700 transition-all duration-200 group">
                        <i class="fas fa-cog text-lg group-hover:scale-110 transition-transform"></i>
                        <span class="font-medium">Pengaturan</span>
                    </a>

                    <div class="pt-4 border-t border-primary-700 mt-6">
                        <a href="#"
                           class="flex items-center space-x-3 p-3 rounded-xl hover:bg-primary-700 transition-all duration-200 group">
                            <i class="fas fa-bell text-lg group-hover:scale-110 transition-transform"></i>
                            <span class="font-medium">Notifikasi</span>
                            <span class="ml-auto bg-red-500 text-white text-xs px-2 py-1 rounded-full">2</span>
                        </a>
                    </div>
                </div>
            </nav>

            <!-- Profile Section -->
            <div class="absolute bottom-0 w-64 border-t border-primary-700 bg-primary-900">
                <div class="flex items-center p-4 space-x-3">
                    <img src="https://ui-avatars.com/api/?name=Super+Admin&background=3b82f6&color=fff" class="w-10 h-10 rounded-full border-2 border-primary-600">
                    <div class="flex-1">
                        <p class="text-sm font-medium">{{ Auth::user()->nama ?? 'Super Admin' }}</p>
                        <p class="text-xs text-primary-300">Superadmin</p>
                    </div>
                    <button onclick="document.getElementById('logout-form').submit()"
                           class="p-2 rounded-lg hover:bg-primary-700 transition-colors duration-200 group">
                        <i class="fas fa-sign-out-alt text-primary-300 group-hover:text-white"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex-1 lg:ml-0">
            <!-- Top Navigation -->
            <div class="bg-white shadow-sm border-b border-slate-200">
                <div class="px-6 py-4 flex items-center justify-between">
                    <div class="flex items-center space-x-4">
                        <button id="hamburger" class="lg:hidden p-2 rounded-lg hover:bg-slate-100 transition-colors duration-200" onclick="toggleSidebar()">
                            <i class="fas fa-bars text-slate-600"></i>
                        </button>
                        <div>
                            <h2 class="text-xl font-bold text-slate-800">@yield('header', 'Dashboard Overview')</h2>
                            <p class="text-sm text-slate-500">@yield('subtitle', 'Kelola seluruh sistem Andi\'s Futsal')</p>
                        </div>
                    </div>
                    <div class="flex items-center space-x-3">
                        <button class="relative p-2 rounded-lg hover:bg-slate-100 transition-colors duration-200">
                            <i class="fas fa-bell text-slate-600"></i>
                            <span class="absolute -top-1 -right-1 w-4 h-4 bg-red-500 text-white text-xs rounded-full flex items-center justify-center">2</span>
                        </button>
                        <button class="p-2 rounded-lg hover:bg-slate-100 transition-colors duration-200">
                            <i class="fas fa-envelope text-slate-600"></i>
                        </button>
                        <div class="w-8 h-8 bg-primary-500 rounded-lg flex items-center justify-center">
                            <i class="fas fa-crown text-white text-sm"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Content Section -->
            <div class="p-6">
                @yield('content')
            </div>
        </div>
    </div>

    <!-- Overlay for mobile -->
    <div id="sidebar-overlay" class="fixed inset-0 bg-black bg-opacity-50 z-20 hidden lg:hidden" onclick="toggleSidebar()"></div>

    <!-- Logout Form -->
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
        @csrf
    </form>

    <!-- JavaScript -->
    <script>
        // Show loading
        showLoading();

        // Hide loading
        hideLoading();

        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('sidebar-overlay');

            sidebar.classList.toggle('-translate-x-full');
            overlay.classList.toggle('hidden');
        }

        // Close sidebar when clicking outside on mobile
        document.addEventListener('click', function(event) {
            const sidebar = document.getElementById('sidebar');
            const hamburger = document.getElementById('hamburger');

            if (window.innerWidth < 1024 &&
                !sidebar.contains(event.target) &&
                !hamburger.contains(event.target) &&
                !sidebar.classList.contains('-translate-x-full')) {
                toggleSidebar();
            }
        });

        // Handle window resize
        window.addEventListener('resize', function() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('sidebar-overlay');

            if (window.innerWidth >= 1024) {
                sidebar.classList.remove('-translate-x-full');
                overlay.classList.add('hidden');
            }
        });
    </script>
</body>
</html>
