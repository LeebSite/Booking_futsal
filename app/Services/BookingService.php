<?php

namespace App\Services;

use App\Models\Pesanan;
use App\Models\Lapangan;
use App\Models\Pengguna;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

class BookingService
{
    /**
     * Create a new booking
     */
    public function createBooking(array $data, int $userId): Pesanan
    {
        return DB::transaction(function () use ($data, $userId) {
            // Validasi ketersediaan lapangan
            $lapangan = Lapangan::findOrFail($data['id_lapangan']);
            
            if ($lapangan->status !== 'tersedia') {
                throw new \Exception('Lapangan tidak tersedia untuk booking.');
            }

            // Double check ketersediaan jam
            $this->validateTimeAvailability($data['id_lapangan'], $data['tanggal'], $data['jam']);

            // Hitung total biaya
            $jumlahJam = count($data['jam']);
            $totalBiaya = $jumlahJam * $lapangan->harga_per_jam;

            // Buat pesanan
            $pesanan = Pesanan::create([
                'id_lapangan' => $lapangan->id,
                'id_pengguna' => $userId,
                'nama_lengkap' => $data['nama_lengkap'],
                'alamat' => $data['alamat'],
                'no_telepon' => $data['no_telepon'],
                'tanggal' => $data['tanggal'],
                'jam' => implode(', ', $data['jam']),
                'jumlah_jam' => $jumlahJam,
                'total_biaya' => $totalBiaya,
                'catatan' => $data['catatan'] ?? null,
                'status' => Pesanan::STATUS_PENDING,
            ]);

            Log::info('New booking created', [
                'pesanan_id' => $pesanan->id,
                'user_id' => $userId,
                'lapangan_id' => $lapangan->id,
                'tanggal' => $data['tanggal'],
                'jam' => implode(', ', $data['jam']),
                'total_biaya' => $totalBiaya
            ]);

            return $pesanan;
        });
    }

    /**
     * Validate time availability
     */
    private function validateTimeAvailability(int $lapanganId, string $tanggal, array $jamDipilih): void
    {
        $pesananPadaTanggal = Pesanan::where('id_lapangan', $lapanganId)
            ->where('tanggal', $tanggal)
            ->whereNotIn('status', [Pesanan::STATUS_REJECTED, Pesanan::STATUS_CANCELLED])
            ->pluck('jam');

        $jamSudahDipesan = $pesananPadaTanggal->flatMap(function ($jam) {
            return explode(', ', $jam);
        })->toArray();

        foreach ($jamDipilih as $jam) {
            if (in_array($jam, $jamSudahDipesan)) {
                throw new \Exception("Jam $jam sudah dipesan. Silakan pilih jam lain.");
            }
        }
    }

    /**
     * Get available times for a field on specific date
     */
    public function getAvailableTimes(int $lapanganId, string $tanggal): array
    {
        $jamOperasional = [
            '08:00', '09:00', '10:00', '11:00', '12:00',
            '13:00', '14:00', '15:00', '16:00', '17:00',
            '18:00', '19:00', '20:00', '21:00', '22:00',
        ];

        $pesananPadaTanggal = Pesanan::where('id_lapangan', $lapanganId)
            ->where('tanggal', $tanggal)
            ->whereNotIn('status', [Pesanan::STATUS_REJECTED, Pesanan::STATUS_CANCELLED])
            ->pluck('jam');

        $jamSudahDipesan = $pesananPadaTanggal->flatMap(function ($jam) {
            return explode(', ', $jam);
        })->toArray();

        return array_diff($jamOperasional, $jamSudahDipesan);
    }

    /**
     * Cancel booking
     */
    public function cancelBooking(int $pesananId, int $userId, string $reason = null): bool
    {
        return DB::transaction(function () use ($pesananId, $userId, $reason) {
            $pesanan = Pesanan::where('id', $pesananId)
                ->where('id_pengguna', $userId)
                ->firstOrFail();

            if (!$pesanan->isCancellable()) {
                throw new \Exception('Pesanan tidak dapat dibatalkan.');
            }

            $pesanan->update([
                'status' => Pesanan::STATUS_CANCELLED,
                'catatan' => $reason ? "Dibatalkan: $reason" : 'Dibatalkan oleh customer'
            ]);

            Log::info('Booking cancelled', [
                'pesanan_id' => $pesanan->id,
                'user_id' => $userId,
                'reason' => $reason
            ]);

            return true;
        });
    }

    /**
     * Accept booking (admin)
     */
    public function acceptBooking(int $pesananId, int $adminId): bool
    {
        return DB::transaction(function () use ($pesananId, $adminId) {
            $pesanan = Pesanan::findOrFail($pesananId);

            if ($pesanan->status !== Pesanan::STATUS_PENDING) {
                throw new \Exception('Hanya pesanan dengan status pending yang bisa diterima.');
            }

            if (!$pesanan->bukti_pembayaran) {
                throw new \Exception('Pesanan belum memiliki bukti pembayaran.');
            }

            $pesanan->update(['status' => Pesanan::STATUS_ACCEPTED]);

            Log::info('Booking accepted by admin', [
                'pesanan_id' => $pesanan->id,
                'admin_id' => $adminId,
                'customer_id' => $pesanan->id_pengguna
            ]);

            return true;
        });
    }

    /**
     * Reject booking (admin)
     */
    public function rejectBooking(int $pesananId, int $adminId, string $reason): bool
    {
        return DB::transaction(function () use ($pesananId, $adminId, $reason) {
            $pesanan = Pesanan::findOrFail($pesananId);

            if (!in_array($pesanan->status, [Pesanan::STATUS_PENDING, Pesanan::STATUS_ACCEPTED])) {
                throw new \Exception('Pesanan tidak dapat ditolak.');
            }

            $pesanan->update([
                'status' => Pesanan::STATUS_REJECTED,
                'alasan_penolakan' => $reason
            ]);

            Log::info('Booking rejected by admin', [
                'pesanan_id' => $pesanan->id,
                'admin_id' => $adminId,
                'customer_id' => $pesanan->id_pengguna,
                'reason' => $reason
            ]);

            return true;
        });
    }

    /**
     * Get booking statistics
     */
    public function getBookingStats(string $period = 'month'): array
    {
        $query = Pesanan::query();

        switch ($period) {
            case 'today':
                $query->whereDate('created_at', Carbon::today());
                break;
            case 'week':
                $query->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]);
                break;
            case 'month':
                $query->whereMonth('created_at', Carbon::now()->month)
                      ->whereYear('created_at', Carbon::now()->year);
                break;
            case 'year':
                $query->whereYear('created_at', Carbon::now()->year);
                break;
        }

        return [
            'total' => $query->count(),
            'pending' => (clone $query)->where('status', Pesanan::STATUS_PENDING)->count(),
            'accepted' => (clone $query)->where('status', Pesanan::STATUS_ACCEPTED)->count(),
            'rejected' => (clone $query)->where('status', Pesanan::STATUS_REJECTED)->count(),
            'cancelled' => (clone $query)->where('status', Pesanan::STATUS_CANCELLED)->count(),
            'revenue' => (clone $query)->where('status', Pesanan::STATUS_ACCEPTED)->sum('total_biaya'),
        ];
    }

    /**
     * Get popular time slots
     */
    public function getPopularTimeSlots(int $limit = 5): array
    {
        $bookings = Pesanan::where('status', Pesanan::STATUS_ACCEPTED)
            ->whereDate('tanggal', '>=', Carbon::now()->subMonths(3))
            ->get();

        $timeSlots = [];
        foreach ($bookings as $booking) {
            $jams = explode(', ', $booking->jam);
            foreach ($jams as $jam) {
                $timeSlots[$jam] = ($timeSlots[$jam] ?? 0) + 1;
            }
        }

        arsort($timeSlots);
        return array_slice($timeSlots, 0, $limit, true);
    }
}
