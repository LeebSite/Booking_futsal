@extends('customer.customer_layout')

@section('title', 'Beranda - Andi\'s Futsal')

@section('content')
<!-- Hero Section -->
<div class="glass-effect rounded-2xl p-8 mb-8 card-hover">
    <div class="flex flex-col lg:flex-row items-center justify-between">
        <div class="lg:w-2/3 mb-6 lg:mb-0">
            <h1 class="text-4xl lg:text-5xl font-bold text-primary-800 mb-4">
                Selamat Datang di <span class="text-primary-600">Andi's Futsal</span>
            </h1>
            <p class="text-lg text-primary-700 mb-6 leading-relaxed">
                Nikmati pengalaman bermain futsal terbaik dengan fasilitas modern dan lapangan berkualitas tinggi.
                Booking mudah, main seru!
            </p>
            <div class="flex flex-col sm:flex-row gap-4">
                <a href="/customer/bookinglap" class="inline-flex items-center px-6 py-3 bg-primary-500 text-white font-semibold rounded-lg hover:bg-primary-600 transition-colors duration-200 shadow-lg hover:shadow-xl">
                    <i class="fas fa-calendar-plus mr-2"></i>
                    Booking Sekarang
                </a>
                <a href="/riwayat" class="inline-flex items-center px-6 py-3 bg-white text-primary-600 font-semibold rounded-lg border-2 border-primary-200 hover:border-primary-300 hover:bg-primary-50 transition-colors duration-200">
                    <i class="fas fa-history mr-2"></i>
                    Lihat Riwayat
                </a>
            </div>
        </div>
        <div class="lg:w-1/3 flex justify-center">
            <div class="w-64 h-64 bg-gradient-to-br from-primary-400 to-primary-600 rounded-full flex items-center justify-center shadow-2xl">
                <i class="fas fa-futbol text-white text-8xl"></i>
            </div>
        </div>
    </div>
</div>

<!-- Quick Stats -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
    <div class="glass-effect rounded-xl p-6 text-center card-hover">
        <div class="w-16 h-16 bg-primary-100 rounded-full flex items-center justify-center mx-auto mb-4">
            <i class="fas fa-map-marked-alt text-primary-600 text-2xl"></i>
        </div>
        <h3 class="text-xl font-semibold text-primary-800 mb-2">Lapangan Berkualitas</h3>
        <p class="text-primary-600">Fasilitas modern dengan standar internasional</p>
    </div>

    <div class="glass-effect rounded-xl p-6 text-center card-hover">
        <div class="w-16 h-16 bg-primary-100 rounded-full flex items-center justify-center mx-auto mb-4">
            <i class="fas fa-clock text-primary-600 text-2xl"></i>
        </div>
        <h3 class="text-xl font-semibold text-primary-800 mb-2">Booking Mudah</h3>
        <p class="text-primary-600">Sistem reservasi online yang praktis dan cepat</p>
    </div>

    <div class="glass-effect rounded-xl p-6 text-center card-hover">
        <div class="w-16 h-16 bg-primary-100 rounded-full flex items-center justify-center mx-auto mb-4">
            <i class="fas fa-users text-primary-600 text-2xl"></i>
        </div>
        <h3 class="text-xl font-semibold text-primary-800 mb-2">Komunitas Aktif</h3>
        <p class="text-primary-600">Bergabung dengan pemain futsal lainnya</p>
    </div>
</div>

<!-- Quick Actions -->
<div class="glass-effect rounded-2xl p-8">
    <h2 class="text-2xl font-bold text-primary-800 mb-6 text-center">Aksi Cepat</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
        <a href="/customer/bookinglap" class="flex flex-col items-center p-6 rounded-xl bg-gradient-to-br from-primary-50 to-primary-100 hover:from-primary-100 hover:to-primary-200 transition-all duration-200 card-hover">
            <div class="w-12 h-12 bg-primary-500 rounded-lg flex items-center justify-center mb-3">
                <i class="fas fa-plus text-white"></i>
            </div>
            <span class="font-semibold text-primary-800">Booking Baru</span>
        </a>

        <a href="/riwayat" class="flex flex-col items-center p-6 rounded-xl bg-gradient-to-br from-blue-50 to-blue-100 hover:from-blue-100 hover:to-blue-200 transition-all duration-200 card-hover">
            <div class="w-12 h-12 bg-blue-500 rounded-lg flex items-center justify-center mb-3">
                <i class="fas fa-history text-white"></i>
            </div>
            <span class="font-semibold text-blue-800">Riwayat Booking</span>
        </a>

        <a href="/profil" class="flex flex-col items-center p-6 rounded-xl bg-gradient-to-br from-purple-50 to-purple-100 hover:from-purple-100 hover:to-purple-200 transition-all duration-200 card-hover">
            <div class="w-12 h-12 bg-purple-500 rounded-lg flex items-center justify-center mb-3">
                <i class="fas fa-user text-white"></i>
            </div>
            <span class="font-semibold text-purple-800">Profil Saya</span>
        </a>

        <a href="#" class="flex flex-col items-center p-6 rounded-xl bg-gradient-to-br from-orange-50 to-orange-100 hover:from-orange-100 hover:to-orange-200 transition-all duration-200 card-hover">
            <div class="w-12 h-12 bg-orange-500 rounded-lg flex items-center justify-center mb-3">
                <i class="fas fa-phone text-white"></i>
            </div>
            <span class="font-semibold text-orange-800">Hubungi Kami</span>
        </a>
    </div>
</div>
@endsection
