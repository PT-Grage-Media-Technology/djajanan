<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNullableColumnsToCmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cms', function (Blueprint $table) {
            $table->string('company_name')->nullable()->change();
            $table->string('email')->nullable()->change();
            $table->string('phone')->nullable()->change();
            $table->string('logo')->nullable()->change();
            $table->string('gambar_home_1')->nullable()->change();
            $table->string('gambar_home_2')->nullable()->change();
            $table->string('gambar_home_3')->nullable()->change();
            $table->string('lokasi')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cms', function (Blueprint $table) {
            $table->string('company_name')->nullable(false)->change();
            $table->string('email')->nullable(false)->change();
            $table->string('phone')->nullable(false)->change();
            $table->string('logo')->nullable(false)->change();
            $table->string('gambar_home_1')->nullable(false)->change();
            $table->string('gambar_home_2')->nullable(false)->change();
            $table->string('gambar_home_3')->nullable(false)->change();
            $table->string('lokasi')->nullable(false)->change();
        });
    }
}
