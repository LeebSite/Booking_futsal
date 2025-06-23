@extends('admin.admin_layout')

@section('content')
<div class="container mx-auto p-4">
    <div class="bg-white p-4 rounded-lg shadow-sm">
        <h1 class="text-xl font-bold mb-4 text-gray-800">Daftar Pesanan Booking</h1>

        @if(session('success'))
            <div class="bg-green-50 border border-green-200 text-green-800 p-3 rounded-lg mb-4">
                <div class="flex items-center">
                    <i class="fas fa-check-circle mr-2 text-green-600"></i>
                    {{ session('success') }}
                </div>
            </div>
        @endif

        <!-- Compact Table -->
        <x-compact-table
            :headers="['#', 'Pemesan', 'Lapangan', 'Jam', 'Jadwal', 'Bukti', 'Status', 'Aksi']"
            searchable="true"
            searchPlaceholder="Cari pesanan...">

            @forelse($pesanan as $index => $order)
                <x-compact-table-row>
                    <x-compact-table-cell>
                        <span class="table-row-number">{{ $index + 1 }}</span>
                    </x-compact-table-cell>
                    <x-compact-table-cell>
                        <x-compact-table-avatar
                            :name="$order->nama_lengkap"
                            color="blue">
                            <div class="text-xs text-gray-500">#{{ $order->id }}</div>
                        </x-compact-table-avatar>
                    </x-compact-table-cell>
                    <x-compact-table-cell>
                        <div class="font-medium text-gray-800 text-xs">{{ $order->lapangan->nama_lapangan }}</div>
                        <div class="text-xs text-gray-500">{{ \Carbon\Carbon::parse($order->tanggal)->format('d M Y') }}</div>
                    </x-compact-table-cell>
                    <x-compact-table-cell>
                        <div class="font-medium text-gray-800 text-xs">{{ $order->jumlah_jam }} jam</div>
                        <x-compact-table-number :value="$order->total_biaya" format="currency" class="text-xs text-gray-500" />
                    </x-compact-table-cell>
                    <x-compact-table-cell>
                        <div class="text-xs text-gray-700">{{ implode(', ', explode(',', $order->jam)) }}</div>
                    </x-compact-table-cell>
                    <x-compact-table-cell>
                        <x-safe-image
                            :src="$order->bukti_pembayaran"
                            alt="Bukti Pembayaran"
                            class="w-6 h-6 object-cover rounded shadow-sm"
                            fallbackIcon="fas fa-receipt"
                            :showLink="true" />
                    </x-compact-table-cell>
                    <x-compact-table-cell>
                        <x-compact-status-badge :status="$order->status ?? 'pending'" type="pill">
                            {{ ucfirst($order->status ?? 'pending') }}
                        </x-compact-status-badge>
                    </x-compact-table-cell>
                    <x-compact-table-cell>
                        <x-compact-action-buttons>
                            @if(($order->status ?? 'pending') === 'pending')
                                <form action="{{ route('admin.booking.accept', $order->id) }}" method="POST" class="inline">
                                    @csrf
                                    <button type="submit" class="compact-btn compact-btn-sm compact-btn-success" title="Terima">
                                        <i class="fas fa-check"></i>
                                    </button>
                                </form>
                                <form action="{{ route('admin.booking.reject', $order->id) }}" method="POST" class="inline">
                                    @csrf
                                    <button type="submit" class="compact-btn compact-btn-sm compact-btn-danger" title="Tolak">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </form>
                            @else
                                <span class="text-xs text-gray-500">{{ ucfirst($order->status ?? 'pending') }}</span>
                            @endif
                        </x-compact-action-buttons>
                    </x-compact-table-cell>
                </x-compact-table-row>
            @empty
                <x-compact-table-row>
                    <x-compact-table-cell colspan="8" align="center">
                        <div class="py-8 text-center">
                            <div class="w-12 h-12 bg-gray-100 rounded-lg flex items-center justify-center mx-auto mb-3">
                                <i class="fas fa-calendar-times text-gray-400 text-lg"></i>
                            </div>
                            <p class="text-xs text-gray-500">Tidak ada pesanan yang ditemukan</p>
                        </div>
                    </x-compact-table-cell>
                </x-compact-table-row>
            @endforelse
        </x-compact-table>
    </div>
</div>
@endsection