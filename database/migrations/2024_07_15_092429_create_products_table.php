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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->string('photo');
            $table->unsignedBigInteger('price');
            $table->unsignedBigInteger('quantity');
            $table->float('rating')->nullable(); // Menambahkan kolom quantity
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->foreignId('creator_id')->constrained('users')->onDelete('cascade'); // Menambahkan kolom creator_id
            $table->foreignId('store_id')->constrained('toko', 'id_toko')->onDelete('cascade'); // Merujuk ke tabel toko
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
