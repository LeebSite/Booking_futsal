<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable; // Ganti ini
use Illuminate\Notifications\Notifiable;

class Pengguna extends Authenticatable // Ganti dari Model ke Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'pengguna'; // Nama tabel
    protected $fillable = ['nama', 'username', 'email', 'password', 'role']; // Kolom yang dapat diisi

    // Jika Anda menggunakan hashing untuk password, Anda bisa menambahkan accessor
    public function getAuthPassword()
    {
        return $this->password;
    }
}