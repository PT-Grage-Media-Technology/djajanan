<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDeskripsiToTokoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('toko', function (Blueprint $table) {
            $table->text('deskripsi_toko')->nullable()->after('nama_toko'); // Sesuaikan posisi 'after' dengan kolom yang diinginkan
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('toko', function (Blueprint $table) {
            $table->dropColumn('deskripsi');
        });
    }
}
