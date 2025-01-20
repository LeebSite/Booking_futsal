<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;

    // Nama tabel di database
    protected $table = 'pesanan';

    // Kolom yang dapat diisi (fillable)
    protected $fillable = [
        'id_lapangan',
        'nama_lengkap',
        'alamat',
        'no_telepon',
        'tanggal',
        'jam',
        'jumlah_jam',
        'total_biaya',
        'bukti_pembayaran',
        'status',
    ];

    /**
     * Relasi ke model Lapangan.
     */
    public function lapangan()
    {
        return $this->belongsTo(Lapangan::class, 'id_lapangan', 'id');
    }
}
