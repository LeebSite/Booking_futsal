<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;

    protected $table = 'pesanan';

    protected $fillable = [
        'id_pengguna',
        'id_lapangan',
        'tanggal',
        'jam_mulai',
        'jumlah_jam',
        'nama_lengkap',
        'alamat',
        'no_telepon',
        'total_biaya',
        'status',
    ];

    public function lapangan()
    {
        return $this->belongsTo(Lapangan::class, 'id_lapangan');
    }

    public function pengguna()
    {
        return $this->belongsTo(Pengguna::class, 'id_pengguna');
    }
}
