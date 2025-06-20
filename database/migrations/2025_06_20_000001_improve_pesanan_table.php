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
            // Menambahkan kolom id_pengguna untuk relasi dengan user
            $table->unsignedBigInteger('id_pengguna')->nullable()->after('id_lapangan');
            
            // Menambahkan kolom tambahan
            $table->text('catatan')->nullable()->after('status');
            $table->text('alasan_penolakan')->nullable()->after('catatan');
            
            // Menambahkan soft deletes
            $table->softDeletes()->after('updated_at');
            
            // Menambahkan foreign key constraint
            $table->foreign('id_pengguna')->references('id')->on('pengguna')->onDelete('set null');
            
            // Menambahkan index untuk performa
            $table->index(['tanggal', 'status']);
            $table->index(['id_lapangan', 'tanggal']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pesanan', function (Blueprint $table) {
            // Menghapus foreign key constraint
            $table->dropForeign(['id_pengguna']);
            
            // Menghapus index
            $table->dropIndex(['tanggal', 'status']);
            $table->dropIndex(['id_lapangan', 'tanggal']);
            
            // Menghapus kolom
            $table->dropColumn(['id_pengguna', 'catatan', 'alasan_penolakan']);
            $table->dropSoftDeletes();
        });
    }
};
