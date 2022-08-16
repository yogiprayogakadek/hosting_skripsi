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
        Schema::create('ulasan', function (Blueprint $table) {
            $table->id('id_ulasan');
            $table->foreignId('id_lokasi')->references('id_lokasi')->on('lokasi')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('id_user')->references('id_user')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->string('ulasan', 100);
            // $table->integer('rating');
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
        Schema::dropIfExists('ulasan');
    }
};
