<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('jadwal_lapangan', function (Blueprint $table) {
            $table->id('id');
            $table->foreignId('id_lapangan')->constrained('lapangan', 'id'); // Tentukan foreign key
            $table->date('tanggal');
            $table->time('jam_mulai');
            $table->time('jam_selesai');
            $table->enum('status', ['kosong', 'dipesan', 'terkonfirmasi'])->default('kosong');
            $table->timestamps();
        });        
    }
    public function down(): void
    {
        Schema::dropIfExists('jadwal_lapangan');
    }
};
