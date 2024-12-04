@extends('customer.customer_layout')

@section('content')

<h1 class="text-3xl font-bold mb-8 text-gray-800">Riwayat Pemesanan Lapangan</h1>

<div class="bg-white p-6 rounded-lg shadow-lg">
    <h2 class="text-2xl font-semibold text-gray-800 mb-6">Daftar Pemesanan Anda</h2>

    <div class="space-y-4">
        <!-- Card Riwayat 1 -->
        <div class="flex justify-between items-center p-4 bg-gray-50 rounded-md shadow-md hover:bg-gray-100 transition duration-300">
            <div class="flex items-center space-x-4">
                <img src="https://via.placeholder.com/50" alt="Lapangan" class="w-16 h-16 object-cover rounded-md">
                <div>
                    <h3 class="font-semibold text-gray-800">Lapangan Sintetis A</h3>
                    <p class="text-gray-600">Tanggal: 20 Desember 2024</p>
                </div>
            </div>
            <button class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700 transition duration-300">Lihat Detail</button>
        </div>

        <!-- Card Riwayat 2 -->
        <div class="flex justify-between items-center p-4 bg-gray-50 rounded-md shadow-md hover:bg-gray-100 transition duration-300">
            <div class="flex items-center space-x-4">
                <img src="https://via.placeholder.com/50" alt="Lapangan" class="w-16 h-16 object-cover rounded-md">
                <div>
                    <h3 class="font-semibold text-gray-800">Lapangan Vinyl B</h3>
                    <p class="text-gray-600">Tanggal: 22 Desember 2024</p>
                </div>
            </div>
            <button class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700 transition duration-300">Lihat Detail</button>
        </div>

    </div>
</div>

@endsection
