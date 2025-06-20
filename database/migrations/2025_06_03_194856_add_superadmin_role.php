<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;  // Tambahkan ini

class AddSuperadminRole extends Migration
{
    public function up()
    {
        Schema::table('pengguna', function (Blueprint $table) {
            DB::statement("ALTER TABLE pengguna MODIFY role ENUM('superadmin', 'admin', 'customer') NOT NULL DEFAULT 'customer'");
        });
    }

    public function down()
    {
        Schema::table('pengguna', function (Blueprint $table) {
            DB::statement("ALTER TABLE pengguna MODIFY role ENUM('admin', 'customer') NOT NULL DEFAULT 'customer'");
        });
    }
}