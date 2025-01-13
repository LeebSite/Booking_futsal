@extends('customer.customer_layout')

@section('content')
<div class="container mx-auto p-5">
    <h1 class="text-2xl font-bold mb-5">Detail Booking</h1>
    <div class="bg-white shadow-md rounded p-6">
        <p><strong>Kode Transaksi:</strong> #{{ $pesanan->id }}</p>
        <img src="{{ asset('storage/'.$pesanan->lapangan->foto) }}" alt="{{ $pesanan->lapangan->nama_lapangan }}" class="rounded w-full h-48 object-cover my-4">
        <p><strong>Nama Lapangan:</strong> {{ $pesanan->lapangan->nama_lapangan }}</p>
        <p><strong>Harga/Jam:</strong> Rp{{ number_format($pesanan->lapangan->harga_per_jam, 0, ',', '.') }}</p>
        <p><strong>Nama Lengkap:</strong> {{ $pesanan->nama_lengkap }}</p>
        <p><strong>Alamat:</strong> {{ $pesanan->alamat }}</p>
        <p><strong>No. Telepon:</strong> {{ $pesanan->no_telepon }}</p>
        <p><strong>Jumlah Jam:</strong> {{ $pesanan->jumlah_jam }}</p>
        <p><strong>Jam:</strong> {{ implode(', ', explode(',', $pesanan->jam)) }}</p>
        <p><strong>Total Bayar:</strong> Rp{{ number_format($pesanan->total_biaya, 0, ',', '.') }}</p>
        <p class="text-yellow-500 font-bold mt-4">Status Transaksi: {{ $pesanan->status }}</p>
    </div>
</div>
@endsection
