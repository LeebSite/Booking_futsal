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
            $table->string('no_hp', 15)->nullable()->after('email');
            $table->date('tanggal_lahir')->nullable()->after('no_hp');
            $table->timestamp('email_verified_at')->nullable()->after('tanggal_lahir');
            $table->rememberToken()->after('role');
            $table->softDeletes()->after('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pengguna', function (Blueprint $table) {
            $table->dropColumn(['no_hp', 'tanggal_lahir', 'email_verified_at', 'remember_token']);
            $table->dropSoftDeletes();
        });
    }
};
