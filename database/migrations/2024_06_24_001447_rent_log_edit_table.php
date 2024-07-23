<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateRentLogsTable extends Migration
{
    public function up()
    {
        Schema::table('rent_logs', function (Blueprint $table) {
            // Jika kolom status sudah ada, Anda bisa mengubahnya
            $table->string('status', 10)->change();

            // Jika kolom status belum ada, tambahkan kolom baru
            if (!Schema::hasColumn('rent_logs', 'status')) {
                $table->string('status', 10)->default('pending')->after('user_id');
            }
        });
    }

    public function down()
    {
        Schema::table('rent_logs', function (Blueprint $table) {
            // Jika Anda ingin menghapus kolom status saat rollback
            $table->dropColumn('status');
        });
    }
}
