<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement("
            CREATE VIEW laporan_transaksi AS
            SELECT users.name AS customer, lapangan.nama AS lapangan, bookings.tanggal_booking, bookings.total_bayar
            FROM bookings
            JOIN users ON bookings.user_id = users.id  -- Pastikan ini sesuai
            JOIN lapangan ON bookings.lapangan_id = lapangan.id
            WHERE bookings.status = 'selesai' AND bookings.payment_status = 'lunas'
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("DROP VIEW IF EXISTS laporan_transaksi");
    }
    
};
