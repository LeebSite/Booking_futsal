@extends('customer.customer_layout')

@section('content')
<div class="container mx-auto p-5">
    <h1 class="text-2xl font-bold mb-5">Booking Lapangan</h1>
    <form method="POST" action="{{ route('customer.booking.store') }}">
        @csrf
        <input type="hidden" name="id_lapangan" value="{{ $lapangan->id }}">
        
        <div class="mb-4">
            <label class="block">Nama Lapangan:</label>
            <input type="text" value="{{ $lapangan->nama_lapangan }}" readonly class="border rounded w-full p-2">
        </div>
        
        <div class="mb-4">
            <label class="block">Harga/Jam:</label>
            <input type="text" value="Rp{{ number_format($lapangan->harga_per_jam, 0, ',', '.') }}" readonly class="border rounded w-full p-2">
        </div>

        <div class="mb-4">
            <label class="block">Nama Lengkap:</label>
            <input type="text" name="nama_lengkap" required class="border rounded w-full p-2">
        </div>

        <div class="mb-4">
            <label class="block">Alamat:</label>
            <textarea name="alamat" required class="border rounded w-full p-2"></textarea>
        </div>

        <div class="mb-4">
            <label class="block">No. Telepon:</label>
            <input type="text" name="no_telepon" required class="border rounded w-full p-2">
        </div>

        <div class="mb-4">
            <label class="block">Tanggal:</label>
            <input type="date" name="tanggal" value="{{ $tanggalDipilih }}" class="border rounded w-full p-2" onchange="location.href='?tanggal=' + this.value">
        </div>        

        <div class="mb-4">
            <label class="block">Jam:</label>
            <div class="grid grid-cols-4 gap-2">
                @foreach ($jamTersedia as $jam)
                    <label>
                        <input type="checkbox" name="jam[]" value="{{ $jam }}">
                        <span class="px-4 py-2 border rounded block text-center hover:bg-green-200 cursor-pointer">
                            {{ $jam }}
                        </span>
                    </label>
                @endforeach
            </div>
        </div>        

        <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded">Booking Lapangan</button>
    </form>
</div>
@endsection