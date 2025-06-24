<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard - Andi\'s Futsal')</title>
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
            background: #f8fafc;
            overflow-x: hidden;
        }

        html {
            overflow-x: hidden;
        }
        .sidebar-item {
            transition: all 0.2s ease;
        }
        .sidebar-item:hover {
            background: rgba(16, 185, 129, 0.1);
            color: #059669;
        }
        .sidebar-item.active {
            background: #10b981;
            color: white;
        }
        .card-shadow {
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);
        }
        .card-shadow:hover {
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }

        /* Ensure header stays fixed width and doesn't scroll */
        .top-navigation {
            position: sticky;
            top: 0;
            z-index: 40;
            width: 100%;
            max-width: 100vw;
            overflow: hidden;
        }

        /* Mobile responsive header */
        @media (max-width: 768px) {
            .top-navigation .flex {
                flex-wrap: nowrap;
                overflow: hidden;
            }

            .top-navigation .space-x-4 {
                gap: 0.5rem;
            }

            .top-navigation button {
                flex-shrink: 0;
            }
        }

        /* Mobile Sidebar - Full height overlay */
        @media (max-width: 1024px) {
            #sidebar {
                height: 100vh;
                top: 0;
                left: 0;
                position: fixed;
                box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1);
            }

            #sidebar.show {
                transform: translateX(0);
            }
        }
    </style>
</head>
<body class="bg-gray-50">
    @include('components.loading-screen')

    <div class="min-h-screen flex">
        <!-- Sidebar -->
        <div id="sidebar" class="w-64 bg-white border-r border-gray-200 min-h-screen transition-transform transform -translate-x-full lg:translate-x-0 fixed lg:relative z-50">
            <!-- Logo & Title -->
            <div class="p-6 border-b border-gray-100">
                <div class="flex items-center space-x-3">
                    <div class="w-8 h-8 bg-primary-500 rounded-lg flex items-center justify-center">
                        <i class="fas fa-futbol text-white text-sm"></i>
                    </div>
                    <div>
                        <h1 class="text-lg font-semibold text-gray-900">Andi's Futsal</h1>
                    </div>
                </div>
            </div>

            <!-- Navigation -->
            <nav class="mt-8 px-4">
                <div class="space-y-1">
                    <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider px-3 mb-3">HOME</p>
                    <a href="/admin/beranda"
                       class="sidebar-item flex items-center space-x-3 px-3 py-2 rounded-lg text-sm font-medium text-gray-700 {{ request()->is('admin/beranda') ? 'active' : '' }}">
                        <i class="fas fa-home w-5"></i>
                        <span>Dashboard</span>
                    </a>
                </div>

                <div class="space-y-1 mt-8">
                    <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider px-3 mb-3">UTILITIES</p>
                    <a href="/admin/lapangan"
                       class="sidebar-item flex items-center space-x-3 px-3 py-2 rounded-lg text-sm font-medium text-gray-700 {{ request()->is('admin/lapangan*') ? 'active' : '' }}">
                        <i class="fas fa-map-marked-alt w-5"></i>
                        <span>Lapangan</span>
                    </a>

                    <a href="/admin/booking"
                       class="sidebar-item flex items-center space-x-3 px-3 py-2 rounded-lg text-sm font-medium text-gray-700 {{ request()->is('admin/booking*') ? 'active' : '' }}">
                        <i class="fas fa-calendar-check w-5"></i>
                        <span>Pesanan</span>
                        <span class="ml-auto bg-red-500 text-white text-xs px-2 py-1 rounded-full">3</span>
                    </a>

                    <a href="/admin/laporan"
                       class="sidebar-item flex items-center space-x-3 px-3 py-2 rounded-lg text-sm font-medium text-gray-700 {{ request()->is('admin/laporan*') ? 'active' : '' }}">
                        <i class="fas fa-chart-line w-5"></i>
                        <span>Laporan</span>
                    </a>
                </div>

                <div class="space-y-1 mt-8">
                    <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider px-3 mb-3">AUTH</p>
                    <a href="/profil"
                       class="sidebar-item flex items-center space-x-3 px-3 py-2 rounded-lg text-sm font-medium text-gray-700">
                        <i class="fas fa-user w-5"></i>
                        <span>Profil</span>
                    </a>
                </div>
            </nav>

            <!-- Profile Section -->
            <div class="absolute bottom-0 w-64 border-t border-gray-100 bg-white">
                <div class="flex items-center p-4 space-x-3">
                    <img src="https://ui-avatars.com/api/?name=Admin&background=22c55e&color=fff" class="w-10 h-10 rounded-lg">
                    <div class="flex-1">
                        <p class="text-sm font-medium text-gray-900">{{ Auth::user()->nama ?? 'Admin' }}</p>
                        <p class="text-xs text-gray-500">Administrator</p>
                    </div>
                    <button onclick="document.getElementById('logout-form').submit()"
                           class="p-2 rounded-lg hover:bg-gray-100 transition-colors duration-200">
                        <i class="fas fa-sign-out-alt text-gray-400 hover:text-gray-600"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex-1 lg:ml-0 overflow-x-hidden">
            <!-- Top Navigation -->
            <div class="top-navigation bg-white border-b border-gray-200">
                <div class="px-6 py-4 flex items-center justify-between">
                    <div class="flex items-center space-x-4">
                        <button id="hamburger" class="lg:hidden p-2 rounded-lg hover:bg-gray-100 transition-colors duration-200" onclick="toggleSidebar()">
                            <i class="fas fa-bars text-gray-600"></i>
                        </button>
                        <div>
                            <h1 class="text-2xl font-semibold text-gray-900">@yield('header', 'Dashboard')</h1>
                        </div>
                    </div>
                    <div class="flex items-center space-x-4">
                        <button class="p-2 rounded-lg hover:bg-gray-100 transition-colors duration-200">
                            <i class="fas fa-search text-gray-400"></i>
                        </button>
                        <button class="relative p-2 rounded-lg hover:bg-gray-100 transition-colors duration-200">
                            <i class="fas fa-bell text-gray-400"></i>
                            <span class="absolute -top-1 -right-1 w-4 h-4 bg-red-500 text-white text-xs rounded-full flex items-center justify-center">3</span>
                        </button>
                        <div class="w-8 h-8 bg-primary-500 rounded-lg flex items-center justify-center">
                            <i class="fas fa-user text-white text-sm"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Content Section -->
            <div class="p-6">
                <div class="max-w-7xl mx-auto">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>

    <!-- Overlay for mobile -->
    <div id="sidebar-overlay" class="fixed inset-0 bg-black bg-opacity-50 z-40 hidden lg:hidden" onclick="toggleSidebar()"></div>

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
            sidebar.classList.toggle('show');
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
                sidebar.classList.remove('show');
                overlay.classList.add('hidden');
            }
        });
    </script>
</body>
</html>