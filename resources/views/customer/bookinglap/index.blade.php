@extends('customer.customer_layout')

@section('content')
<div class="container mx-auto p-5">
    <h1 class="text-2xl font-bold mb-5">Pilih Tanggal</h1>
    <form method="GET" action="{{ route('customer.bookinglap') }}">
        <input type="date" name="tanggal" value="{{ request('tanggal', now()->toDateString()) }}" 
               class="border rounded p-2 mb-5 w-full">
        <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded">Cari</button>
    </form>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
        @foreach($lapangan as $item)
        <div class="bg-white shadow-md rounded p-4">
            <img src="{{ asset('storage/'.$item->foto) }}" alt="{{ $item->nama_lapangan }}" class="rounded w-full h-48 object-cover">
            <h2 class="text-xl font-bold mt-2">{{ $item->nama_lapangan }}</h2>
            <p>{{ $item->deskripsi }}</p>
            <p class="text-green-600 font-semibold">Rp{{ number_format($item->harga_per_jam, 0, ',', '.') }} / Jam</p>
            <p class="text-gray-600 mt-2">Jadwal Terisi:</p>
            <ul>
                @foreach($item->pesanan as $pesanan)
                <li>{{ $pesanan->jam }}</li>
                @endforeach
            </ul>
            <a href="{{ route('customer.booking.create', $item->id) }}" 
               class="block mt-4 bg-indigo-600 text-white text-center px-4 py-2 rounded">Pilih Lapangan</a>
        </div>
        @endforeach
    </div>
</div>
@endsection