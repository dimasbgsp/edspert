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
        Schema::create('user_details_tabel', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')
            ->onDelete('cascade');
            // ondelete perlu diperhatikan, delete satu ke delete semua 
            // unsigned untuk foreignkey hingga foreign untuk relasi 
            // foreign(table yang berisi foreignkey)->references(id dari primary key)->on(nama table primary key)
            $table->string('address')->nullable();
            // nullable berarti data bisa kosong
            $table->string('phone_number', 20)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_details_tabel');
    }
};
