<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Superadmin Dashboard - Andi\'s Futsal')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-100">
    @include('components.loading-screen')
    <div class="min-h-screen flex">
        <!-- Sidebar -->
        <div id="sidebar" class="w-64 bg-gradient-to-b from-indigo-800 to-indigo-900 text-white min-h-screen shadow-lg transition-transform transform -translate-x-full md:translate-x-0">
            <!-- Logo & Title -->
            <div class="p-4 border-b border-indigo-700">
                <div class="flex items-center space-x-3">
                    <i class="fas fa-futbol text-2xl"></i>
                    <h1 class="text-xl font-bold">Superadmin Panel</h1>
                </div>
            </div>
            
            <!-- Navigation -->
            <nav class="mt-6">
                <div class="px-4 space-y-2">
                    <a href="{{ route('superadmin.beranda') }}" 
                       class="flex items-center space-x-3 p-3 rounded-lg hover:bg-indigo-700 transition-all duration-200 {{ request()->routeIs('superadmin.beranda') ? 'bg-indigo-700' : '' }}">
                        <i class="fas fa-home"></i>
                        <span>Dashboard</span>
                    </a>
                    
                    <a href="{{ route('superadmin.users') }}" 
                       class="flex items-center space-x-3 p-3 rounded-lg hover:bg-indigo-700 transition-all duration-200 {{ request()->routeIs('superadmin.users') ? 'bg-indigo-700' : '' }}">
                        <i class="fas fa-users"></i>
                        <span>Manage Users</span>
                    </a>
                    
                    <a href="#" 
                       class="flex items-center space-x-3 p-3 rounded-lg hover:bg-indigo-700 transition-all duration-200">
                        <i class="fas fa-chart-bar"></i>
                        <span>Reports</span>
                    </a>
                    
                    <a href="#" 
                       class="flex items-center space-x-3 p-3 rounded-lg hover:bg-indigo-700 transition-all duration-200">
                        <i class="fas fa-cog"></i>
                        <span>Settings</span>
                    </a>
                </div>
            </nav>
            
            <!-- Profile Section -->
            <div class="absolute bottom-0 w-64 border-t border-indigo-700">
                <div class="flex items-center p-4 space-x-3">
                    <img src="https://ui-avatars.com/api/?name=Super+Admin" class="w-10 h-10 rounded-full">
                    <div>
                        <p class="text-sm font-medium">Super Admin</p>
                        <a href="{{ route('logout') }}" 
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                           class="text-xs text-indigo-300 hover:text-white">
                            Logout
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex-1">
            <!-- Top Navigation -->
            <div class="bg-white shadow-sm">
                <div class="px-8 py-4 flex items-center justify-between">
                    <button id="hamburger" class="md:hidden p-2 rounded-full hover:bg-gray-100" onclick="toggleSidebar()">
                        <i class="fas fa-bars text-gray-600"></i>
                    </button>
                    <h2 class="text-2xl font-semibold text-gray-800">@yield('header', 'Dashboard Overview')</h2>
                    <div class="flex items-center space-x-4">
                        <button class="p-2 rounded-full hover:bg-gray-100">
                            <i class="fas fa-bell text-gray-600"></i>
                        </button>
                        <button class="p-2 rounded-full hover:bg-gray-100">
                            <i class="fas fa-envelope text-gray-600"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Content Section -->
            <div class="p-8">
                @yield('content')
            </div>
        </div>
    </div>

    <!-- Logout Form -->
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
        @csrf
    </form>

    <script>
        // Show loading
        showLoading();

        // Hide loading
        hideLoading();

        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('-translate-x-full');
        }
    </script>
</body>
</html>
