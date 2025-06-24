@extends('admin.admin_layout')

@section('title', 'Edit Lapangan - Andi\'s Futsal')
@section('header', 'Edit Lapangan')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-md">
    <h1 class="text-2xl font-bold mb-4 text-gray-800">Edit Lapangan</h1>

    <form action="{{ route('lapangan.update', $lapangan->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf
        @method('PUT')
        <div>
            <label class="block text-gray-700">Nama Lapangan</label>
            <input type="text" name="nama_lapangan" class="border border-gray-300 rounded w-full p-2" value="{{ $lapangan->nama_lapangan }}" required>
        </div>
        <div>
            <label class="block text-gray-700">Deskripsi</label>
            <textarea name="deskripsi" class="border border-gray-300 rounded w-full p-2">{{ $lapangan->deskripsi }}</textarea>
        </div>
        <div>
            <label class="block text-gray-700">Harga Per Jam</label>
            <input type="number" name="harga_per_jam" class="border border-gray-300 rounded w-full p-2" value="{{ $lapangan->harga_per_jam }}" required>
        </div>
        <div>
            <label class="block text-gray-700">Status</label>
            <select name="status" class="border border-gray-300 rounded w-full p-2">
                <option value="tersedia" {{ $lapangan->status == 'tersedia' ? 'selected' : '' }}>Tersedia</option>
                <option value="tidak_tersedia" {{ $lapangan->status == 'tidak_tersedia' ? 'selected' : '' }}>Tidak Tersedia</option>
            </select>
        </div>
        <div>
            <label class="block text-gray-700">Foto</label>
            <input type="file" name="foto" class="border border-gray-300 rounded w-full p-2">
            @if($lapangan->foto)
                <img src="{{ Storage::url($lapangan->foto) }}" alt="Foto Lapangan" class="w-20 h-20 object-cover mt-2">
            @endif
        </div>
        <div>
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white px-4 py-2 rounded">
                <i class="fas fa-save"></i> Simpan
            </button>
            <a href="{{ route('lapangan.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white px-4 py-2 rounded">
                <i class="fas fa-times"></i> Batal
            </a>
        </div>
    </form>
</div>
@endsection