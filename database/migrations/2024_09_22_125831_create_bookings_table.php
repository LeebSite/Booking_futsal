<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Foreign key ke tabel users
            $table->foreignId('lapangan_id')->constrained('lapangan')->onDelete('cascade'); // Foreign key ke tabel lapangan
            $table->date('tanggal_booking');
            $table->time('jam_mulai');
            $table->time('jam_selesai');
            $table->enum('status', ['menunggu', 'dikonfirmasi', 'ditolak', 'selesai']);
            $table->decimal('total_bayar', 10, 2)->nullable();
            $table->enum('payment_status', ['belum_bayar', 'lunas']);
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
