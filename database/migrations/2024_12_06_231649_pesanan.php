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
        $table->foreignId('id_pengguna')->constrained('pengguna', 'id'); 
        $table->foreignId('id_lapangan')->constrained('lapangan', 'id');
        $table->date('tanggal');
        $table->time('jam_mulai');
        $table->time('jam_selesai');
        $table->integer('jumlah_jam');
        $table->decimal('total_biaya', 10, 2);
        $table->string('nama_lengkap');
        $table->text('alamat');
        $table->string('no_telepon');
        $table->enum('status', ['menunggu_konfirmasi', 'diterima', 'ditolak'])->default('menunggu_konfirmasi');
        $table->timestamps();
    });
}


    public function down(): void
    {
        Schema::dropIfExists('pesanan');
    }
};
