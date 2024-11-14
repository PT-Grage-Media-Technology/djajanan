<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('toko', function (Blueprint $table) {
            $table->id('id_toko');
            $table->foreignId('id_seller')->constrained('users'); // Assuming 'users' is your sellers table
            $table->string('nama_toko');
            $table->text('alamat_toko');
            $table->string('foto_profile_toko')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('toko');
    }
};
