@extends('customer.customer_layout')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-2xl md:text-3xl font-extrabold mb-8 text-start text-gray-800">Pilih Tanggal</h1>
    <form method="GET" action="{{ route('customer.bookinglap') }}" class="flex items-start justify-left gap-3 mb-10">
        <input type="date" name="tanggal" value="{{ request('tanggal', now()->toDateString()) }}" 
               class="border border-gray-300 rounded-md p-2 w-full md:w-1/3 focus:ring focus:ring-indigo-500 focus:border-indigo-500 transition">
        <button type="submit" class="bg-indigo-500 text-white p-4 rounded-xl hover:bg-indigo-600 transition duration-200 flex items-start justify-center">
            <i class="fa-solid fa-magnifying-glass"></i>
        </button>
    </form>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
        @foreach($lapangan as $item)
        <div class="bg-white border border-gray-200 shadow-sm rounded-lg overflow-hidden hover:shadow-md transition duration-200">
            <img src="{{ asset('storage/'.$item->foto) }}" alt="{{ $item->nama_lapangan }}" class="w-full h-48 object-cover">
            <div class="p-4">
                <h2 class="text-lg font-semibold mb-1 text-gray-900">{{ $item->nama_lapangan }}</h2>
                <p class="text-sm text-gray-600 mb-2">{{ $item->deskripsi }}</p>
                <p class="text-green-500 font-bold mb-2">Rp{{ number_format($item->harga_per_jam, 0, ',', '.') }} / Jam</p>
                <p class="text-sm text-gray-600 font-medium">Jadwal Terisi:</p>
                <ul class="list-disc list-inside text-sm text-gray-700">
                    @foreach($item->pesanan as $pesanan)
                    <li>{{ $pesanan->jam }}</li>
                    @endforeach
                </ul>
                <a href="{{ route('customer.booking.create', $item->id) }}" 
                   class="block mt-4 bg-indigo-500 text-white text-center px-4 py-2 rounded-md hover:bg-indigo-600 transition duration-200">Pilih Lapangan</a>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
