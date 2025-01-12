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
            $table->foreignId('id_lapangan')->constrained('lapangan', 'id'); 
            $table->date('tanggal');
            $table->time('jam');
            $table->enum('status', ['kosong', 'dipesan'])->default('kosong');
            $table->timestamps();
        });
    }
    

    public function down(): void
    {
        Schema::dropIfExists('jadwal_lapangan');
    }
};
