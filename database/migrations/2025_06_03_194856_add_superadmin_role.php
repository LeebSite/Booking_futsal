<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSuperadminRole extends Migration
{
    public function up()
    {
        Schema::table('pengguna', function (Blueprint $table) {
            DB::statement("ALTER TABLE pengguna MODIFY COLUMN role ENUM('superadmin', 'admin', 'customer')");
        });
    }

    public function down()
    {
        Schema::table('pengguna', function (Blueprint $table) {
            DB::statement("ALTER TABLE pengguna MODIFY COLUMN role ENUM('admin', 'customer')");
        });
    }
}