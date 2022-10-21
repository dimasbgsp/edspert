<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_details_tabel', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_details_tabel', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->after('id');

            $table->foreign('user_id')->references('id')->on('users')
            ->onDelete('cascade');
        });
    }
    // perintah diatas untuk menghilangkan column yang tidak dipakai
    // apabila ingin menampilkan column yang hilang lalu dipakai kembali dengan cara
    // php artisan migrate:rollback --step=(1-end)
    // dimana 1-end merupakan nilai batch di migration 
    // dapat dilihat di phpmyadminya dibagian migrasi
};
