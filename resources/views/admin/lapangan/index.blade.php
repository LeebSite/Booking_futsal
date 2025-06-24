@extends('admin.admin_layout')

@section('title', 'Kelola Lapangan - Andi\'s Futsal')
@section('header', 'Lapangan')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold mb-4 text-gray-800">Kelola Lapangan</h1>

        @if(session('success'))
            <div class="bg-green-100 text-green-800 p-4 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="flex justify-between items-center mb-4">
            <div></div>
            <a href="{{ route('lapangan.create') }}" class="compact-btn compact-btn-md compact-btn-primary">
                <i class="fas fa-plus mr-1"></i> Tambah Lapangan
            </a>
        </div>

        <!-- Compact Table -->
        <x-compact-table
            :headers="['#', 'Lapangan', 'Deskripsi', 'Harga', 'Status', 'Foto', 'Aksi']"
            searchable="true"
            searchPlaceholder="Cari lapangan...">

            @foreach ($lapangan as $index => $item)
                <x-compact-table-row>
                    <x-compact-table-cell>
                        <span class="table-row-number">{{ $index + 1 }}</span>
                    </x-compact-table-cell>
                    <x-compact-table-cell>
                        <x-compact-table-avatar
                            :name="$item->nama_lapangan"
                            icon="fas fa-futbol"
                            color="green">
                            <div class="text-xs text-gray-500">ID: {{ $item->id }}</div>
                        </x-compact-table-avatar>
                    </x-compact-table-cell>
                    <x-compact-table-cell>
                        <div class="max-w-xs">
                            <p class="text-gray-700 truncate text-xs">{{ $item->deskripsi }}</p>
                        </div>
                    </x-compact-table-cell>
                    <x-compact-table-cell>
                        <x-compact-table-number :value="$item->harga_per_jam" format="currency" />
                        <div class="text-xs text-gray-500 mt-0.5">per jam</div>
                    </x-compact-table-cell>
                    <x-compact-table-cell>
                        <x-compact-status-badge :status="$item->status" type="pill">
                            {{ ucfirst($item->status) }}
                        </x-compact-status-badge>
                    </x-compact-table-cell>
                    <x-compact-table-cell>
                        <x-safe-image
                            :src="$item->foto"
                            :alt="$item->nama_lapangan"
                            class="w-8 h-8 object-cover rounded shadow-sm"
                            :showLink="true" />
                    </x-compact-table-cell>
                    <x-compact-table-cell>
                        <x-compact-action-buttons>
                            <a href="{{ route('lapangan.edit', $item->id) }}" class="compact-btn compact-btn-sm compact-btn-warning" title="Edit">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('lapangan.destroy', $item->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="compact-btn compact-btn-sm compact-btn-danger" title="Hapus"
                                        onclick="return confirm('Yakin ingin menghapus lapangan ini?')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </x-compact-action-buttons>
                    </x-compact-table-cell>
                </x-compact-table-row>
            @endforeach
        </x-compact-table>
    </div>
@endsection