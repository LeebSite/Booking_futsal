@extends('admin.admin_layout')

@section('content')
<div class="container mx-auto">
    <div class="bg-white p-6 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold mb-4 text-gray-800">Kelola Lapangan</h1>

        @if(session('success'))
            <div class="bg-green-100 text-green-800 p-4 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('lapangan.create') }}" class="button-tambah bg-blue-600 hover:bg-blue-700 text-white mb-4 inline-block">
            <i class="fas fa-plus-circle"></i> Tambah Lapangan
        </a>
        <div class="overflow-x-auto">
            <table class="min-w-full border-collapse border border-gray-300 rounded-lg overflow-hidden">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="border border-gray-300 px-3 py-3 text-left text-gray-700 bg-gray-200">Nama Lapangan</th>
                        <th class="border border-gray-300 px-3 py-3 text-left text-gray-700 bg-gray-200">Deskripsi</th>
                        <th class="border border-gray-300 px-3 py-3 text-left text-gray-700 bg-gray-200">Harga Per Jam</th>
                        <th class="border border-gray-300 px-3 py-3 text-left text-gray-700 bg-gray-200">Status</th>
                        <th class="border border-gray-300 px-3 py-3 text-left text-gray-700 bg-gray-200">Foto</th>
                        <th class="border border-gray-300 px-3 py-3 text-left text-gray-700 bg-gray-200">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($lapangan as $item)
                    <tr class="hover:bg-gray-100">
                        <td class="border border-gray-200 px-3 py-1">{{ $item->nama_lapangan }}</td>
                        <td class="border border-gray-200 px-3 py-1">{{ $item->deskripsi }}</td>
                        <td class="border border-gray-200 px-3 py-1">Rp {{ number_format($item->harga_per_jam, 0, ',', '.') }}</td>
                        <td class="border border-gray-200 px-3 py-1">{{ ucfirst($item->status) }}</td>
                        <td class="border border-gray-200 px-4 py-0">
                            @if($item->foto)
                                <img src="{{ Storage::url($item->foto) }}" alt="{{ $item->nama_lapangan }}" style="height: 100px; object-fit: cover;">
                            @else
                                <span class="text-gray-500">Tidak ada foto</span>
                            @endif
                        </td>
                        <td class="border border-gray-200 px-2 py-2 flex gap-2">
                            <a href="{{ route('lapangan.edit', $item->id) }}" class="button-ubah bg-yellow-500 text-white hover:bg-yellow-600">
                                <i class="fas fa-edit"></i> Ubah
                            </a>
                            <form action="{{ route('lapangan.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')">
                                @csrf
                                @method('DELETE')
                                <button class="button-hapus bg-red-500 text-white hover:bg-red-600">
                                    <i class="fas fa-trash"></i> Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>   
        </div>
    </div>
</div>
@endsection