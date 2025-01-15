@extends('customer.customer_layout')

@section('content')
<div class="container mx-auto p-5">
    <h1 class="text-3xl font-bold mb-6 text-center">Pilih Tanggal</h1>
    <form method="GET" action="{{ route('customer.bookinglap') }}" class="mb-6">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between">
            <input type="date" name="tanggal" value="{{ request('tanggal', now()->toDateString()) }}" 
                   class="border rounded p-2 mb-4 md:mb-0 w-full md:w-1/3">
            <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700 transition duration-200">Cari</button>
        </div>
    </form>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($lapangan as $item)
        <div class="bg-white shadow-lg rounded-lg overflow-hidden transition-transform transform hover:scale-105">
            <img src="{{ asset('storage/'.$item->foto) }}" alt="{{ $item->nama_lapangan }}" class="w-full h-48 object-cover">
            <div class="p-4">
                <h2 class="text-xl font-bold mb-2">{{ $item->nama_lapangan }}</h2>
                <p class="text-gray-600 mb-2">{{ $item->deskripsi }}</p>
                <p class="text-green-600 font-semibold mb-2">Rp{{ number_format($item->harga_per_jam, 0, ',', '.') }} / Jam</p>
                <p class="text-gray-600 mt-2">Jadwal Terisi:</p>
                <ul class="list-disc list-inside text-gray-700">
                    @foreach($item->pesanan as $pesanan)
                    <li>{{ $pesanan->jam }}</li>
                    @endforeach
                </ul>
                <a href="{{ route('customer.booking.create', $item->id) }}" 
                   class="block mt-4 bg-indigo-600 text-white text-center px-4 py-2 rounded hover:bg-indigo-700 transition duration-200">Pilih Lapangan</a>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection