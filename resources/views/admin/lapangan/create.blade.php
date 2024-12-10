@extends('admin.admin_layout')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-md">
    <h1 class="font-bold mb-4 text-gray-800">Tambah Lapangan</h1>

    <form action="{{ route('lapangan.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf
        <div>
            <label class="block text-gray-700">Nama Lapangan</label>
            <input type="text" name="nama_lapangan" class="border border-gray-300 rounded w-full p-2" required>
        </div>
        <div>
            <label class="block text-gray-700">Deskripsi</label>
            <textarea name="deskripsi" class="border border-gray-300 rounded w-full p-2"></textarea>
        </div>
        <div>
            <label class="block text-gray-700">Harga Per Jam</label>
            <input type="number" name="harga_per_jam" class="border border-gray-300 rounded w-full p-2" required>
        </div>
        <div>
            <label class="block text-gray-700">Status</label>
            <select name="status" class="border border-gray-300 rounded w-full p-2">
                <option value="tersedia">Tersedia</option>
                <option value="tidak_tersedia">Tidak Tersedia</option>
            </select>
        </div>
        <div>
            <label class="block text-gray-700">Foto</label>
            <input type="file" name="foto" class="border border-gray-300 rounded w-full p-2">
        </div>
        <div>
            <button type="submit" class="button-simpan bg-green-500 hover:bg-green-700 text-white">
                <i class="fas fa-save"></i> Simpan
            </button>
            <a href="{{ route('lapangan.index') }}" class="button-batal bg-gray-500 hover:bg-gray-700 text-white">
                <i class="fas fa-times"></i> Batal
            </a>
        </div>
    </form>
</div>
@endsection