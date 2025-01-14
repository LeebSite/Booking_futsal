@extends('admin.admin_layout')

@section('content')
<div class="container mx-auto p-5">
    <h1 class="text-3xl font-bold mb-6 text-center">Daftar Pesanan Booking</h1>

    @if(session('success'))
        <div class="bg-green-500 text-white p-4 rounded mb-6 text-center">
            {{ session('success') }}
        </div>
    @endif

    <table class="table-auto w-full bg-white shadow-lg rounded-lg overflow-hidden">
        <thead class="bg-gray-200">
            <tr class="text-left text-gray-600">
                <th class="p-4">No Pesanan</th>
                <th class="p-4">Nama Pemesan</th>
                <th class="p-4">Lapangan</th>
                <th class="p-4">Jumlah Jam</th>
                <th class="p-4">Jadwal Jam</th>
                <th class="p-4">Bukti Pembayaran</th>
                <th class="p-4">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pesanan as $order)
                <tr class="border-b">
                    <td class="p-4">#{{ $order->id }}</td>
                    <td class="p-4">{{ $order->nama_lengkap }}</td>
                    <td class="p-4">{{ $order->lapangan->nama_lapangan }}</td>
                    <td class="p-4">{{ $order->jumlah_jam }} Jam</td>
                    <td class="p-4">{{ implode(', ', explode(',', $order->jam)) }}</td>
                    <td class="p-4">
                        @if($order->bukti_pembayaran)
                            <a href="{{ asset('storage/'.$order->bukti_pembayaran) }}" class="text-blue-500 underline" target="_blank">Lihat Foto</a>
                        @else
                            <span class="text-gray-500">Belum Ada</span>
                        @endif
                    </td>
                    <td class="p-4 flex gap-2">
                        <form action="{{ route('admin.booking.accept', $order->id) }}" method="POST">
                            @csrf
                            <button class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Terima</button>
                        </form>
                        <form action="{{ route('admin.booking.reject', $order->id) }}" method="POST">
                            @csrf
                            <button class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Tolak</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
