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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('no_order');
            $table->date('tanggal_order');
            $table->integer('quantity');
            $table->string('photo');
            $table->date('order_date');
            $table->foreignId('id_user')->constrained('users')->onDelete('cascade');
            $table->string('location')->default('Perumahan Keandra, Kec. Sumber, Kab. Cirebon, Jawa Barat, Indonesia');
            $table->unsignedBigInteger('harga');
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('toko_id');
            $table->timestamps();

            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('toko_id')->references('id_toko')->on('toko')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
