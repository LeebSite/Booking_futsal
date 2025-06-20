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
        Schema::table('pengguna', function (Blueprint $table) {
            // Check if columns don't exist before adding them
            if (!Schema::hasColumn('pengguna', 'no_hp')) {
                $table->string('no_hp', 15)->nullable()->after('email');
            }
            if (!Schema::hasColumn('pengguna', 'tanggal_lahir')) {
                $table->date('tanggal_lahir')->nullable()->after('no_hp');
            }
            if (!Schema::hasColumn('pengguna', 'email_verified_at')) {
                $table->timestamp('email_verified_at')->nullable()->after('tanggal_lahir');
            }
            if (!Schema::hasColumn('pengguna', 'remember_token')) {
                $table->rememberToken()->after('role');
            }
            if (!Schema::hasColumn('pengguna', 'deleted_at')) {
                $table->softDeletes()->after('updated_at');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pengguna', function (Blueprint $table) {
            $columns = ['no_hp', 'tanggal_lahir', 'email_verified_at', 'remember_token', 'deleted_at'];
            foreach ($columns as $column) {
                if (Schema::hasColumn('pengguna', $column)) {
                    $table->dropColumn($column);
                }
            }
        });
    }
};
