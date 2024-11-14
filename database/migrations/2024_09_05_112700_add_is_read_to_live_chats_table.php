<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIsReadToLiveChatsTable extends Migration
{
    public function up()
    {
        Schema::table('live_chats', function (Blueprint $table) {
            $table->boolean('is_read')->default(false); // Menambahkan kolom is_read
        });
    }

    public function down()
    {
        Schema::table('live_chats', function (Blueprint $table) {
            $table->dropColumn('is_read'); // Menghapus kolom is_read jika rollback
        });
    }
}
