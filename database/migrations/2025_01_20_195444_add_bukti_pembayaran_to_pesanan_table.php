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
        Schema::table('pesanan', function (Blueprint $table) {
            // Menambahkan kolom bukti_pembayaran
            $table->string('bukti_pembayaran')->nullable()->after('total_biaya');
            
            // Mengubah default status menjadi 'pending'
            // Pastikan telah menginstal doctrine/dbal
            $table->string('status')->default('pending')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pesanan', function (Blueprint $table) {
            // Menghapus kolom bukti_pembayaran
            $table->dropColumn('bukti_pembayaran');
            
            // Mengembalikan kolom status ke pengaturan sebelumnya
            $table->string('status')->default(null)->change();
        });
    }
};
