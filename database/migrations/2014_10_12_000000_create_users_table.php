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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            // $table->string('name'); sesuai dengan yang tabel yang di grup 
            $table->string('email', 25)->unique();
            // 25 adalah lengthnya 
            $table->timestamp('email_verified_at')->nullable();
            // timestamp disimpan dalam waktu
            $table->string('password');
            // default apabila tidak diisi lengthnya otomatis bernilai 255
            $table->rememberToken();
            $table->timestamps();
            // timestamps berisi created_at and update_ad
            // $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
