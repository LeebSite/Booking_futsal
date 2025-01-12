<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pesanan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_lapangan');
            $table->string('nama_lengkap');
            $table->text('alamat');
            $table->string('no_telepon');
            $table->date('tanggal');
            $table->string('jam'); // Simpan waktu dalam bentuk string (contoh: "18:00, 19:00")
            $table->integer('jumlah_jam');
            $table->integer('total_biaya');
            $table->string('status')->default('pending');
            $table->timestamps();
        
            $table->foreign('id_lapangan')->references('id')->on('lapangan')->onDelete('cascade');
        });
        
}


    public function down(): void
    {
        Schema::dropIfExists('pesanan');
    }
};
