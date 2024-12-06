<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pesanan', function (Blueprint $table) {
            $table->id('id'); // Primary key
            $table->foreignId('id_pengguna')->constrained('pengguna', 'id'); // Foreign key ke tabel 'pengguna'
            $table->foreignId('id_lapangan')->constrained('lapangan', 'id'); // Foreign key ke tabel 'lapangan'
            $table->enum('status', ['menunggu_konfirmasi', 'diterima', 'ditolak'])->default('menunggu_konfirmasi');
            $table->timestamps();
        });        
    }

    public function down(): void
    {
        Schema::dropIfExists('pemesanan');
    }
};
