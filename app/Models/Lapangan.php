<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lapangan extends Model
{
    use HasFactory;

    protected $table = 'lapangan';
    protected $fillable = ['nama_lapangan', 'deskripsi', 'harga_per_jam', 'status', 'foto'];

    public function pesanan()
    {
        return $this->hasMany(Pesanan::class, 'id_lapangan');
    }
    // public function jadwal()
    // {
    //     return $this->hasMany(JadwalLapangan::class, 'id_lapangan');
    // }

}
