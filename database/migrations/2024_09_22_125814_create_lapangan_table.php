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
        Schema::create('lapangan', function (Blueprint $table) {
            $table->id(); // Menggunakan id sebagai primary key
            $table->string('nama'); // Kolom nama
            $table->decimal('harga_per_jam', 10, 2); // Kolom harga_per_jam
            $table->binary('foto_lap')->nullable(); // Kolom foto_lap (BLOB)
            $table->enum('status', ['tersedia', 'tidak_tersedia']); // Kolom status
            $table->timestamps(); // Menambahkan created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lapangan');
    }
};
