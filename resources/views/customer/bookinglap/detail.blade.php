@extends('customer.customer_layout')

@section('content')
<div class="container mx-auto p-5">
    <h1 class="text-3xl font-bold mb-6 text-center">Detail Booking</h1>

    @if(session('success'))
        <div class="bg-green-500 text-white p-4 rounded mb-6 text-center">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white shadow-lg rounded-lg overflow-hidden">
        <!-- Laptop/Desktop Layout -->
        <div class="hidden md:flex">
            <div class="w-1/2">
                <img src="{{ asset('storage/'.$pesanan->lapangan->foto) }}" alt="{{ $pesanan->lapangan->nama_lapangan }}" class="w-full h-full object-cover">
            </div>
            <div class="w-1/2 p-8">
                <h2 class="text-2xl font-semibold mb-4">{{ $pesanan->lapangan->nama_lapangan }}</h2>
                <p class="text-gray-700 mb-2"><strong>Kode Transaksi:</strong> #{{ $pesanan->id }}</p>
                <p class="text-gray-700 mb-2"><strong>Harga/Jam:</strong> Rp{{ number_format($pesanan->lapangan->harga_per_jam, 0, ',', '.') }}</p>
                <p class="text-gray-700 mb-2"><strong>Nama Lengkap:</strong> {{ $pesanan->nama_lengkap }}</p>
                <p class="text-gray-700 mb-2"><strong>Alamat:</strong> {{ $pesanan->alamat }}</p>
                <p class="text-gray-700 mb-2"><strong>No. Telepon:</strong> {{ $pesanan->no_telepon }}</p>
                <p class="text-gray-700 mb-2"><strong>Jumlah Jam:</strong> {{ $pesanan->jumlah_jam }} Jam</p>
                <p class="text-gray-700 mb-2"><strong>Jam:</strong> {{ implode(', ', explode(',', $pesanan->jam)) }} WIB</p>
                <p class="text-gray-700 mb-4"><strong>Total Bayar:</strong> Rp.{{ number_format($pesanan->total_biaya, 0, ',', '.') }},00</p>
                <p class="text-yellow-500 font-bold">Status Transaksi: {{ $pesanan->status }}</p>

                <div class="flex justify-between mt-4">
                    <form action="{{ route('customer.bookinglap.cancel', $pesanan->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="bg-red-500 text-white py-2 px-4 rounded hover:bg-red-600" onclick="openModal()">
                            Batalkan Booking
                        </button>
                    </form>
                </div>

                <!-- Modal -->
                <div id="confirmationModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
                    <div class="bg-white rounded-lg p-6">
                        <h2 class="text-xl font-bold mb-4">Konfirmasi</h2>
                        <p class="mb-4">Apakah Anda yakin ingin membatalkan pesanan ini?</p>
                        <div class="flex justify-end">
                            <button onclick="closeModal()" class="bg-gray-500 text-white px-4 py-2 rounded mr-2">Batal</button>
                            <form action="{{ route('customer.bookinglap.cancel', $pesanan->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Ya, Batalkan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Mobile Layout -->
        <div class="flex flex-col md:hidden">
            <img src="{{ asset('storage/'.$pesanan->lapangan->foto) }}" alt="{{ $pesanan->lapangan->nama_lapangan }}" class="w-full h-48 object-cover mb-6">
            <div class="p-6">
                <h2 class="text-2xl font-semibold mb-4">{{ $pesanan->lapangan->nama_lapangan }}</h2>
                <p class="text-gray-700 mb-2"><strong>Kode Transaksi:</strong> #{{ $pesanan->id }}</p>
                <p class="text-gray-700 mb-2"><strong>Harga/Jam:</strong> Rp{{ number_format($pesanan->lapangan->harga_per_jam, 0, ',', '.') }}</p>
                <p class="text-gray-700 mb-2"><strong>Nama Lengkap:</strong> {{ $pesanan->nama_lengkap }}</p>
                <p class="text-gray-700 mb-2"><strong>Alamat:</strong> {{ $pesanan->alamat }}</p>
                <p class="text-gray-700 mb-2"><strong>No. Telepon:</strong> {{ $pesanan->no_telepon }}</p>
                <p class="text-gray-700 mb-2"><strong>Jumlah Jam:</strong> {{ $pesanan->jumlah_jam }}</p>
                <p class="text-gray-700 mb-2"><strong>Jam:</strong> {{ implode(', ', explode(',', $pesanan->jam)) }}</p>
                <p class="text-gray-700 mb-4"><strong>Total Bayar:</strong> Rp{{ number_format($pesanan->total_biaya, 0, ',', '.') }}</p>
                <p class="text-yellow-500 font-bold">Status Transaksi: {{ $pesanan->status }}</p>
            </div>
        </div>
    </div>
</div>
<script>
    function openModal() {
        document.getElementById('confirmationModal').classList.remove('hidden');
    }

    function closeModal() {
        document.getElementById('confirmationModal').classList.add('hidden');
    }
</script>

@endsection