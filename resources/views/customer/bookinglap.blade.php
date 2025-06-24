@extends('customer.customer_layout')

@section('title', 'Booking Lapangan - Andi\'s Futsal')

@section('content')
<!-- Header Section -->
<div class="glass-effect rounded-2xl p-8 mb-8">
    <div class="text-center">
        <h1 class="text-4xl font-bold text-primary-800 mb-4">
            <i class="fas fa-calendar-plus mr-3"></i>Booking Lapangan
        </h1>
        <p class="text-lg text-primary-600">Pilih lapangan dan waktu yang sesuai untuk bermain futsal</p>
    </div>
</div>

@if(session('success'))
    <div class="glass-effect border-l-4 border-primary-500 rounded-xl p-6 mb-8">
        <div class="flex items-center">
            <div class="w-8 h-8 bg-primary-100 rounded-full flex items-center justify-center mr-3">
                <i class="fas fa-check text-primary-600"></i>
            </div>
            <div>
                <h3 class="font-semibold text-primary-800">Berhasil!</h3>
                <p class="text-primary-700">{{ session('success') }}</p>
            </div>
        </div>
    </div>
@endif

<!-- Booking Form -->
<div class="glass-effect rounded-2xl p-8">
    <form action="{{ route('customer.booking.store') }}" method="POST" class="space-y-8">
        @csrf

        <!-- Field Selection -->
        <div class="space-y-4">
            <h2 class="text-xl font-semibold text-primary-800 flex items-center">
                <i class="fas fa-map-marked-alt mr-2"></i>Pilih Lapangan
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                @foreach($lapangan as $field)
                    <label class="cursor-pointer">
                        <input type="radio" name="id_lapangan" value="{{ $field->id }}" class="sr-only peer" required>
                        <div class="p-6 rounded-xl border-2 border-primary-200 peer-checked:border-primary-500 peer-checked:bg-primary-50 hover:border-primary-300 transition-all duration-200 card-hover">
                            <div class="text-center">
                                <div class="w-16 h-16 bg-primary-100 rounded-full flex items-center justify-center mx-auto mb-4">
                                    <i class="fas fa-futbol text-primary-600 text-2xl"></i>
                                </div>
                                <h3 class="font-semibold text-primary-800 mb-2">{{ $field->nama_lapangan }}</h3>
                                <p class="text-primary-600 text-sm mb-3">{{ $field->deskripsi }}</p>
                                <div class="text-lg font-bold text-primary-700">
                                    Rp {{ number_format($field->harga_per_jam, 0, ',', '.') }}/jam
                                </div>
                                <div class="mt-3">
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium
                                        {{ $field->status === 'tersedia' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                        {{ ucfirst($field->status) }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </label>
                @endforeach
            </div>
        </div>

        <!-- Date and Time Selection -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- Date Selection -->
            <div class="space-y-4">
                <h2 class="text-xl font-semibold text-primary-800 flex items-center">
                    <i class="fas fa-calendar mr-2"></i>Pilih Tanggal
                </h2>
                <div class="relative">
                    <input type="date" name="tanggal" id="tanggal" required
                           class="w-full px-4 py-3 border-2 border-primary-200 rounded-xl focus:border-primary-500 focus:ring-2 focus:ring-primary-200 transition-colors duration-200 text-primary-800">
                </div>
            </div>

            <!-- Time Selection -->
            <div class="space-y-4">
                <h2 class="text-xl font-semibold text-primary-800 flex items-center">
                    <i class="fas fa-clock mr-2"></i>Pilih Waktu
                </h2>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-primary-700 mb-2">Jam Mulai</label>
                        <input type="time" name="jam_mulai" id="jam_mulai" required
                               class="w-full px-4 py-3 border-2 border-primary-200 rounded-xl focus:border-primary-500 focus:ring-2 focus:ring-primary-200 transition-colors duration-200 text-primary-800">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-primary-700 mb-2">Jam Selesai</label>
                        <input type="time" name="jam_selesai" id="jam_selesai" required
                               class="w-full px-4 py-3 border-2 border-primary-200 rounded-xl focus:border-primary-500 focus:ring-2 focus:ring-primary-200 transition-colors duration-200 text-primary-800">
                    </div>
                </div>
            </div>
        </div>

        <!-- Booking Summary -->
        <div class="bg-primary-50 rounded-xl p-6 border border-primary-200">
            <h3 class="text-lg font-semibold text-primary-800 mb-4 flex items-center">
                <i class="fas fa-receipt mr-2"></i>Ringkasan Booking
            </h3>
            <div id="booking-summary" class="space-y-2 text-primary-700">
                <p>Silakan pilih lapangan dan waktu untuk melihat ringkasan booking</p>
            </div>
        </div>

        <!-- Submit Button -->
        <div class="text-center">
            <button type="submit"
                    class="inline-flex items-center px-8 py-4 bg-primary-500 text-white font-bold text-lg rounded-xl hover:bg-primary-600 focus:ring-4 focus:ring-primary-200 transition-all duration-200 shadow-lg hover:shadow-xl">
                <i class="fas fa-check-circle mr-3"></i>
                Konfirmasi Booking
            </button>
        </div>
    </form>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('form');
    const summary = document.getElementById('booking-summary');

    // Set minimum date to today
    const today = new Date().toISOString().split('T')[0];
    document.getElementById('tanggal').setAttribute('min', today);

    function updateSummary() {
        const selectedField = document.querySelector('input[name="id_lapangan"]:checked');
        const tanggal = document.getElementById('tanggal').value;
        const jamMulai = document.getElementById('jam_mulai').value;
        const jamSelesai = document.getElementById('jam_selesai').value;

        if (selectedField && tanggal && jamMulai && jamSelesai) {
            const fieldLabel = selectedField.closest('label').querySelector('h3').textContent;
            const harga = selectedField.closest('label').querySelector('.text-lg').textContent;

            // Calculate duration
            const start = new Date(`2000-01-01T${jamMulai}`);
            const end = new Date(`2000-01-01T${jamSelesai}`);
            const duration = (end - start) / (1000 * 60 * 60); // hours

            if (duration > 0) {
                const hargaPerJam = parseInt(harga.replace(/[^\d]/g, ''));
                const totalHarga = hargaPerJam * duration;

                summary.innerHTML = `
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <p><strong>Lapangan:</strong> ${fieldLabel}</p>
                            <p><strong>Tanggal:</strong> ${new Date(tanggal).toLocaleDateString('id-ID')}</p>
                        </div>
                        <div>
                            <p><strong>Waktu:</strong> ${jamMulai} - ${jamSelesai}</p>
                            <p><strong>Durasi:</strong> ${duration} jam</p>
                        </div>
                    </div>
                    <div class="border-t border-primary-200 pt-3 mt-3">
                        <p class="text-lg font-bold text-primary-800">
                            <strong>Total Biaya: Rp ${totalHarga.toLocaleString('id-ID')}</strong>
                        </p>
                    </div>
                `;
            } else {
                summary.innerHTML = '<p class="text-red-600">Jam selesai harus lebih besar dari jam mulai</p>';
            }
        }
    }

    // Add event listeners
    form.addEventListener('change', updateSummary);
    form.addEventListener('input', updateSummary);
});
</script>
@endsection
