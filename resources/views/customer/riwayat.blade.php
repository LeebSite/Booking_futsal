@extends('customer.customer_layout')

@section('title', 'Riwayat Booking - Andi\'s Futsal')

@section('content')
<!-- Header Section -->
<div class="glass-effect rounded-2xl p-8 mb-8">
    <div class="text-center">
        <h1 class="text-4xl font-bold text-primary-800 mb-4">
            <i class="fas fa-history mr-3"></i>Riwayat Pemesanan
        </h1>
        <p class="text-lg text-primary-600">Lihat semua riwayat booking lapangan futsal Anda</p>
    </div>
</div>

<!-- Filter Section -->
<div class="glass-effect rounded-xl p-6 mb-8">
    <div class="flex flex-col md:flex-row gap-4 items-center justify-between">
        <div class="flex flex-col sm:flex-row gap-4 flex-1">
            <div class="relative">
                <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-primary-400"></i>
                <input type="text" placeholder="Cari berdasarkan lapangan..."
                       class="pl-10 pr-4 py-2 border-2 border-primary-200 rounded-lg focus:border-primary-500 focus:ring-2 focus:ring-primary-200 transition-colors duration-200">
            </div>
            <select class="px-4 py-2 border-2 border-primary-200 rounded-lg focus:border-primary-500 focus:ring-2 focus:ring-primary-200 transition-colors duration-200">
                <option value="">Semua Status</option>
                <option value="pending">Pending</option>
                <option value="confirmed">Dikonfirmasi</option>
                <option value="completed">Selesai</option>
                <option value="cancelled">Dibatalkan</option>
            </select>
        </div>
        <div class="flex items-center space-x-2 text-primary-600">
            <i class="fas fa-calendar"></i>
            <span class="text-sm font-medium">Total: 12 Booking</span>
        </div>
    </div>
</div>

<!-- Booking History Cards -->
<div class="space-y-6">
    <!-- Sample Booking Card 1 -->
    <div class="glass-effect rounded-xl p-6 card-hover">
        <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-6">
            <div class="flex items-start space-x-4">
                <div class="w-16 h-16 bg-primary-100 rounded-xl flex items-center justify-center flex-shrink-0">
                    <i class="fas fa-futbol text-primary-600 text-2xl"></i>
                </div>
                <div class="flex-1">
                    <div class="flex items-center gap-3 mb-2">
                        <h3 class="text-xl font-semibold text-primary-800">Lapangan Sintetis A</h3>
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">
                            <i class="fas fa-check-circle mr-1"></i>Selesai
                        </span>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3 text-sm text-primary-600">
                        <div class="flex items-center">
                            <i class="fas fa-calendar mr-2 w-4"></i>
                            <span>20 Des 2024</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-clock mr-2 w-4"></i>
                            <span>14:00 - 16:00</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-hourglass-half mr-2 w-4"></i>
                            <span>2 Jam</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-money-bill mr-2 w-4"></i>
                            <span class="font-semibold">Rp 200.000</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex flex-col sm:flex-row gap-3">
                <button class="inline-flex items-center px-4 py-2 bg-primary-500 text-white font-medium rounded-lg hover:bg-primary-600 transition-colors duration-200">
                    <i class="fas fa-eye mr-2"></i>Detail
                </button>
                <button class="inline-flex items-center px-4 py-2 bg-blue-500 text-white font-medium rounded-lg hover:bg-blue-600 transition-colors duration-200">
                    <i class="fas fa-redo mr-2"></i>Booking Lagi
                </button>
            </div>
        </div>
    </div>

    <!-- Sample Booking Card 2 -->
    <div class="glass-effect rounded-xl p-6 card-hover">
        <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-6">
            <div class="flex items-start space-x-4">
                <div class="w-16 h-16 bg-primary-100 rounded-xl flex items-center justify-center flex-shrink-0">
                    <i class="fas fa-futbol text-primary-600 text-2xl"></i>
                </div>
                <div class="flex-1">
                    <div class="flex items-center gap-3 mb-2">
                        <h3 class="text-xl font-semibold text-primary-800">Lapangan Vinyl B</h3>
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                            <i class="fas fa-clock mr-1"></i>Pending
                        </span>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3 text-sm text-primary-600">
                        <div class="flex items-center">
                            <i class="fas fa-calendar mr-2 w-4"></i>
                            <span>25 Des 2024</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-clock mr-2 w-4"></i>
                            <span>16:00 - 18:00</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-hourglass-half mr-2 w-4"></i>
                            <span>2 Jam</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-money-bill mr-2 w-4"></i>
                            <span class="font-semibold">Rp 180.000</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex flex-col sm:flex-row gap-3">
                <button class="inline-flex items-center px-4 py-2 bg-primary-500 text-white font-medium rounded-lg hover:bg-primary-600 transition-colors duration-200">
                    <i class="fas fa-eye mr-2"></i>Detail
                </button>
                <button class="inline-flex items-center px-4 py-2 bg-red-500 text-white font-medium rounded-lg hover:bg-red-600 transition-colors duration-200">
                    <i class="fas fa-times mr-2"></i>Batalkan
                </button>
            </div>
        </div>
    </div>

    <!-- Sample Booking Card 3 -->
    <div class="glass-effect rounded-xl p-6 card-hover">
        <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-6">
            <div class="flex items-start space-x-4">
                <div class="w-16 h-16 bg-primary-100 rounded-xl flex items-center justify-center flex-shrink-0">
                    <i class="fas fa-futbol text-primary-600 text-2xl"></i>
                </div>
                <div class="flex-1">
                    <div class="flex items-center gap-3 mb-2">
                        <h3 class="text-xl font-semibold text-primary-800">Lapangan Rumput C</h3>
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                            <i class="fas fa-check mr-1"></i>Dikonfirmasi
                        </span>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3 text-sm text-primary-600">
                        <div class="flex items-center">
                            <i class="fas fa-calendar mr-2 w-4"></i>
                            <span>28 Des 2024</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-clock mr-2 w-4"></i>
                            <span>19:00 - 21:00</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-hourglass-half mr-2 w-4"></i>
                            <span>2 Jam</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-money-bill mr-2 w-4"></i>
                            <span class="font-semibold">Rp 220.000</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex flex-col sm:flex-row gap-3">
                <button class="inline-flex items-center px-4 py-2 bg-primary-500 text-white font-medium rounded-lg hover:bg-primary-600 transition-colors duration-200">
                    <i class="fas fa-eye mr-2"></i>Detail
                </button>
                <button class="inline-flex items-center px-4 py-2 bg-green-500 text-white font-medium rounded-lg hover:bg-green-600 transition-colors duration-200">
                    <i class="fas fa-upload mr-2"></i>Upload Bukti
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Empty State (if no bookings) -->
<!--
<div class="glass-effect rounded-2xl p-12 text-center">
    <div class="w-24 h-24 bg-primary-100 rounded-full flex items-center justify-center mx-auto mb-6">
        <i class="fas fa-calendar-times text-primary-400 text-4xl"></i>
    </div>
    <h3 class="text-2xl font-semibold text-primary-800 mb-4">Belum Ada Riwayat Booking</h3>
    <p class="text-primary-600 mb-8">Anda belum pernah melakukan booking lapangan. Mulai booking sekarang!</p>
    <a href="/customer/bookinglap" class="inline-flex items-center px-6 py-3 bg-primary-500 text-white font-semibold rounded-lg hover:bg-primary-600 transition-colors duration-200">
        <i class="fas fa-plus mr-2"></i>Booking Sekarang
    </a>
</div>
-->

<!-- Pagination -->
<div class="flex justify-center mt-8">
    <nav class="flex items-center space-x-2">
        <button class="px-3 py-2 text-primary-600 hover:bg-primary-50 rounded-lg transition-colors duration-200">
            <i class="fas fa-chevron-left"></i>
        </button>
        <button class="px-4 py-2 bg-primary-500 text-white rounded-lg">1</button>
        <button class="px-4 py-2 text-primary-600 hover:bg-primary-50 rounded-lg transition-colors duration-200">2</button>
        <button class="px-4 py-2 text-primary-600 hover:bg-primary-50 rounded-lg transition-colors duration-200">3</button>
        <button class="px-3 py-2 text-primary-600 hover:bg-primary-50 rounded-lg transition-colors duration-200">
            <i class="fas fa-chevron-right"></i>
        </button>
    </nav>
</div>

@endsection
