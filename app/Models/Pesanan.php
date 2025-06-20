<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Pesanan extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'pesanan';

    protected $fillable = [
        'id_lapangan',
        'id_pengguna',
        'nama_lengkap',
        'alamat',
        'no_telepon',
        'tanggal',
        'jam',
        'jumlah_jam',
        'total_biaya',
        'bukti_pembayaran',
        'status',
        'catatan',
        'alasan_penolakan'
    ];

    protected $casts = [
        'tanggal' => 'date',
        'total_biaya' => 'integer',
        'jumlah_jam' => 'integer',
    ];

    // Status constants
    const STATUS_PENDING = 'pending';
    const STATUS_ACCEPTED = 'accepted';
    const STATUS_REJECTED = 'rejected';
    const STATUS_COMPLETED = 'completed';
    const STATUS_CANCELLED = 'cancelled';

    public static function getStatusOptions()
    {
        return [
            self::STATUS_PENDING => 'Menunggu Konfirmasi',
            self::STATUS_ACCEPTED => 'Diterima',
            self::STATUS_REJECTED => 'Ditolak',
            self::STATUS_COMPLETED => 'Selesai',
            self::STATUS_CANCELLED => 'Dibatalkan',
        ];
    }

    /**
     * Relasi ke model Lapangan
     */
    public function lapangan()
    {
        return $this->belongsTo(Lapangan::class, 'id_lapangan');
    }

    /**
     * Relasi ke model Pengguna
     */
    public function pengguna()
    {
        return $this->belongsTo(Pengguna::class, 'id_pengguna');
    }

    /**
     * Scope untuk filter berdasarkan status
     */
    public function scopeByStatus($query, $status)
    {
        return $query->where('status', $status);
    }

    /**
     * Scope untuk filter berdasarkan tanggal
     */
    public function scopeByDate($query, $date)
    {
        return $query->whereDate('tanggal', $date);
    }

    /**
     * Accessor untuk format tanggal Indonesia
     */
    public function getTanggalFormattedAttribute()
    {
        return $this->tanggal->format('d F Y');
    }

    /**
     * Accessor untuk status dalam bahasa Indonesia
     */
    public function getStatusLabelAttribute()
    {
        return self::getStatusOptions()[$this->status] ?? $this->status;
    }

    /**
     * Check if booking is still editable
     */
    public function isEditable()
    {
        return in_array($this->status, [self::STATUS_PENDING]) &&
               $this->tanggal->isAfter(Carbon::now());
    }

    /**
     * Check if booking can be cancelled
     */
    public function isCancellable()
    {
        return in_array($this->status, [self::STATUS_PENDING, self::STATUS_ACCEPTED]) &&
               $this->tanggal->isAfter(Carbon::now()->addHours(2));
    }
}
