@extends('customer.customer_layout')

@section('content')
<main class="max-w-8xl mx-auto py-6 sm:px-6 lg:px-8">
    <div class="px-4 py-6 sm:px-0">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">Booking Lapangan</h1>

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('customer.booking.store') }}" method="POST" class="space-y-6">
            @csrf

            <div>
                <label for="lapangan" class="block text-sm font-medium text-gray-700">Pilih Lapangan</label>
                <select name="id_lapangan" id="lapangan" class="block w-full mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500">
                    @foreach($lapangan as $field)
                        <option value="{{ $field->id }}">{{ $field->nama_lapangan }} - Rp{{ number_format($field->harga_per_jam, 0, ',', '.') }}/jam</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="tanggal" class="block text-sm font-medium text-gray-700">Tanggal</label>
                <input type="date" name="tanggal" id="tanggal" class="block w-full mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500">
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label for="jam_mulai" class="block text-sm font-medium text-gray-700">Jam Mulai</label>
                    <input type="time" name="jam_mulai" id="jam_mulai" class="block w-full mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500">
                </div>

                <div>
                    <label for="jam_selesai" class="block text-sm font-medium text-gray-700">Jam Selesai</label>
                    <input type="time" name="jam_selesai" id="jam_selesai" class="block w-full mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500">
                </div>
            </div>

            <div>
                <button type="submit" class="w-full bg-green-600 text-white font-bold py-2 px-4 rounded hover:bg-green-700">
                    Pesan Sekarang
                </button>
            </div>
        </form>
    </div>
</main>
@endsection
