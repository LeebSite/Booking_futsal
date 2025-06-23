@extends('Superadmin.superadmin_layout')

@section('title', 'Dashboard - Superadmin')
@section('header', 'Dashboard Superadmin')
@section('subtitle', 'Selamat datang kembali! Kelola seluruh sistem dari sini.')

@section('content')
<!-- Welcome Section -->
<div class="mb-8">
    <div class="bg-gradient-to-r from-primary-600 to-primary-700 rounded-2xl p-6 text-white">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold mb-2">Selamat Datang, {{ Auth::user()->nama ?? 'Super Admin' }}! 👑</h1>
                <p class="text-primary-100">Kelola seluruh sistem Andi's Futsal dari dashboard superadmin ini.</p>
            </div>
            <div class="hidden md:block">
                <div class="w-20 h-20 bg-white/20 rounded-2xl flex items-center justify-center">
                    <i class="fas fa-crown text-3xl"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Stats Cards -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <!-- Total Users -->
    <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6 hover:shadow-md transition-shadow duration-200">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-slate-500 mb-1">Total Pengguna</p>
                <h3 class="text-2xl font-bold text-slate-900">{{ $stats['total_users'] }}</h3>
                <p class="text-xs text-green-600 font-medium">+{{ $stats['users_this_month'] }} bulan ini</p>
            </div>
            <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center">
                <i class="fas fa-users text-blue-600 text-lg"></i>
            </div>
        </div>
    </div>

    <!-- Total Admins -->
    <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6 hover:shadow-md transition-shadow duration-200">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-slate-500 mb-1">Total Admin</p>
                <h3 class="text-2xl font-bold text-slate-900">{{ $stats['total_admins'] }}</h3>
                <p class="text-xs text-blue-600 font-medium">Aktif semua</p>
            </div>
            <div class="w-12 h-12 bg-purple-100 rounded-xl flex items-center justify-center">
                <i class="fas fa-user-shield text-purple-600 text-lg"></i>
            </div>
        </div>
    </div>

    <!-- Total Customers -->
    <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6 hover:shadow-md transition-shadow duration-200">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-slate-500 mb-1">Total Customer</p>
                <h3 class="text-2xl font-bold text-slate-900">{{ $stats['total_customers'] }}</h3>
                <p class="text-xs text-green-600 font-medium">Pengguna aktif</p>
            </div>
            <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center">
                <i class="fas fa-user-friends text-green-600 text-lg"></i>
            </div>
        </div>
    </div>

    <!-- System Health -->
    <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6 hover:shadow-md transition-shadow duration-200">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-slate-500 mb-1">Status Sistem</p>
                <h3 class="text-2xl font-bold text-green-600">Sehat</h3>
                <p class="text-xs text-green-600 font-medium">Semua layanan normal</p>
            </div>
            <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center">
                <i class="fas fa-heartbeat text-green-600 text-lg"></i>
            </div>
        </div>
    </div>
</div>

<!-- Management Cards -->
<div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
    <!-- User Management -->
    <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6">
        <div class="flex items-center justify-between mb-4">
            <h3 class="text-lg font-semibold text-slate-900">Manajemen Pengguna</h3>
            <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center">
                <i class="fas fa-users text-blue-600"></i>
            </div>
        </div>
        <div class="space-y-3">
            <div class="flex justify-between items-center">
                <span class="text-slate-600">Customer</span>
                <span class="font-semibold text-slate-900">1,180</span>
            </div>
            <div class="flex justify-between items-center">
                <span class="text-slate-600">Admin</span>
                <span class="font-semibold text-slate-900">8</span>
            </div>
            <div class="flex justify-between items-center">
                <span class="text-slate-600">Superadmin</span>
                <span class="font-semibold text-slate-900">2</span>
            </div>
        </div>
        <a href="{{ route('superadmin.users') }}" class="mt-4 block w-full text-center bg-blue-50 hover:bg-blue-100 text-blue-600 font-medium py-2 rounded-lg transition-colors duration-200">
            Kelola Pengguna
        </a>
    </div>

    <!-- System Overview -->
    <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6">
        <div class="flex items-center justify-between mb-4">
            <h3 class="text-lg font-semibold text-slate-900">Ringkasan Sistem</h3>
            <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center">
                <i class="fas fa-server text-green-600"></i>
            </div>
        </div>
        <div class="space-y-3">
            <div class="flex justify-between items-center">
                <span class="text-slate-600">Server Status</span>
                <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">
                    Online
                </span>
            </div>
            <div class="flex justify-between items-center">
                <span class="text-slate-600">Database</span>
                <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">
                    Optimal
                </span>
            </div>
            <div class="flex justify-between items-center">
                <span class="text-slate-600">Storage</span>
                <span class="font-semibold text-slate-900">78% Used</span>
            </div>
        </div>
        <button class="mt-4 block w-full text-center bg-green-50 hover:bg-green-100 text-green-600 font-medium py-2 rounded-lg transition-colors duration-200">
            Lihat Detail
        </button>
    </div>

    <!-- Quick Actions -->
    <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6">
        <div class="flex items-center justify-between mb-4">
            <h3 class="text-lg font-semibold text-slate-900">Aksi Cepat</h3>
            <div class="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center">
                <i class="fas fa-bolt text-purple-600"></i>
            </div>
        </div>
        <div class="space-y-3">
            <button class="w-full flex items-center p-3 rounded-lg hover:bg-slate-50 transition-colors duration-200 group text-left">
                <div class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center mr-3 group-hover:bg-blue-200 transition-colors">
                    <i class="fas fa-user-plus text-blue-600 text-sm"></i>
                </div>
                <span class="font-medium text-slate-900">Tambah Admin</span>
            </button>
            <button class="w-full flex items-center p-3 rounded-lg hover:bg-slate-50 transition-colors duration-200 group text-left">
                <div class="w-8 h-8 bg-green-100 rounded-lg flex items-center justify-center mr-3 group-hover:bg-green-200 transition-colors">
                    <i class="fas fa-download text-green-600 text-sm"></i>
                </div>
                <span class="font-medium text-slate-900">Backup Data</span>
            </button>
            <button class="w-full flex items-center p-3 rounded-lg hover:bg-slate-50 transition-colors duration-200 group text-left">
                <div class="w-8 h-8 bg-orange-100 rounded-lg flex items-center justify-center mr-3 group-hover:bg-orange-200 transition-colors">
                    <i class="fas fa-chart-bar text-orange-600 text-sm"></i>
                </div>
                <span class="font-medium text-slate-900">Lihat Laporan</span>
            </button>
        </div>
    </div>
</div>

<!-- Recent Activity -->
<div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
    <!-- Recent Users -->
    <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6">
        <div class="flex items-center justify-between mb-4">
            <h3 class="text-lg font-semibold text-slate-900">Pengguna Terbaru</h3>
            <a href="{{ route('superadmin.users') }}" class="text-primary-600 hover:text-primary-700 text-sm font-medium">Lihat Semua</a>
        </div>
        <div class="space-y-3">
            <!-- Sample user items -->
            <div class="flex items-center space-x-3 p-3 bg-slate-50 rounded-lg">
                <img src="https://ui-avatars.com/api/?name=Ahmad+Rizki" class="w-10 h-10 rounded-full">
                <div class="flex-1">
                    <p class="font-medium text-slate-900">Ahmad Rizki</p>
                    <p class="text-sm text-slate-500">Customer • 2 jam lalu</p>
                </div>
                <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">
                    Aktif
                </span>
            </div>

            <div class="flex items-center space-x-3 p-3 bg-slate-50 rounded-lg">
                <img src="https://ui-avatars.com/api/?name=Sari+Dewi" class="w-10 h-10 rounded-full">
                <div class="flex-1">
                    <p class="font-medium text-slate-900">Sari Dewi</p>
                    <p class="text-sm text-slate-500">Customer • 5 jam lalu</p>
                </div>
                <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">
                    Aktif
                </span>
            </div>

            <div class="flex items-center space-x-3 p-3 bg-slate-50 rounded-lg">
                <img src="https://ui-avatars.com/api/?name=Budi+Admin" class="w-10 h-10 rounded-full">
                <div class="flex-1">
                    <p class="font-medium text-slate-900">Budi Admin</p>
                    <p class="text-sm text-slate-500">Admin • 1 hari lalu</p>
                </div>
                <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                    Admin
                </span>
            </div>
        </div>
    </div>

    <!-- System Logs -->
    <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6">
        <div class="flex items-center justify-between mb-4">
            <h3 class="text-lg font-semibold text-slate-900">Log Sistem</h3>
            <button class="text-primary-600 hover:text-primary-700 text-sm font-medium">Lihat Semua</button>
        </div>
        <div class="space-y-3">
            <div class="flex items-start space-x-3 p-3 bg-slate-50 rounded-lg">
                <div class="w-2 h-2 bg-green-500 rounded-full mt-2"></div>
                <div class="flex-1">
                    <p class="text-sm font-medium text-slate-900">Backup berhasil</p>
                    <p class="text-xs text-slate-500">Database backup completed successfully</p>
                    <p class="text-xs text-slate-400 mt-1">2 jam lalu</p>
                </div>
            </div>

            <div class="flex items-start space-x-3 p-3 bg-slate-50 rounded-lg">
                <div class="w-2 h-2 bg-blue-500 rounded-full mt-2"></div>
                <div class="flex-1">
                    <p class="text-sm font-medium text-slate-900">User login</p>
                    <p class="text-xs text-slate-500">Admin Budi logged in from 192.168.1.100</p>
                    <p class="text-xs text-slate-400 mt-1">3 jam lalu</p>
                </div>
            </div>

            <div class="flex items-start space-x-3 p-3 bg-slate-50 rounded-lg">
                <div class="w-2 h-2 bg-yellow-500 rounded-full mt-2"></div>
                <div class="flex-1">
                    <p class="text-sm font-medium text-slate-900">Storage warning</p>
                    <p class="text-xs text-slate-500">Storage usage reached 75%</p>
                    <p class="text-xs text-slate-400 mt-1">5 jam lalu</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection