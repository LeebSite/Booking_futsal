@extends('admin.admin_layout')

@section('content')
<div class="container mx-auto p-5">
    <h1 class="text-3xl font-bold mb-6 text-center">Detail Pesanan Diterima</h1>

    @foreach ($pesananDiterima as $tanggal => $pesananHari)
        <div class="bg-gray-100 p-4 rounded-lg shadow mb-6">
            <h2 class="text-xl font-bold text-emerald-600 mb-4">
                Jadwal untuk: {{ \Carbon\Carbon::parse($tanggal)->format('l, d M Y') }}
            </h2>
            <table class="table-auto w-full bg-white shadow-lg rounded-lg overflow-hidden">
                <thead class="bg-gray-200">
                    <tr class="text-left text-gray-600">
                        <th class="p-4">Jam</th>
                        <th class="p-4">Nama Pemesan</th>
                        <th class="p-4">Lapangan</th>
                        <th class="p-4">Jumlah Jam</th>
                        <th class="p-4">Total Biaya</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pesananHari as $pesanan)
                        <tr class="border-b">
                            <td class="p-4">{{ $pesanan->jam }}</td>
                            <td class="p-4">{{ $pesanan->nama_lengkap }}</td>
                            <td class="p-4">{{ $pesanan->lapangan->nama_lapangan }}</td>
                            <td class="p-4">{{ $pesanan->jumlah_jam }} Jam</td>
                            <td class="p-4">Rp {{ number_format($pesanan->total_biaya, 0, ',', '.') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endforeach
</div>
@endsection