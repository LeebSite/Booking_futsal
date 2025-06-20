<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pengguna extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;

    protected $table = 'pengguna';

    protected $fillable = [
        'nama',
        'username',
        'email',
        'password',
        'role',
        'no_hp',
        'tanggal_lahir'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'tanggal_lahir' => 'date',
        'password' => 'hashed',
    ];

    // Relasi dengan pesanan
    public function pesanan()
    {
        return $this->hasMany(Pesanan::class, 'id_pengguna');
    }

    // Scope untuk filter berdasarkan role
    public function scopeByRole($query, $role)
    {
        return $query->where('role', $role);
    }

    // Accessor untuk nama lengkap
    public function getFullNameAttribute()
    {
        return $this->nama;
    }

    // Mutator untuk password
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }
}