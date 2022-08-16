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
        Schema::create('lokasi', function (Blueprint $table) {
            $table->id('id_lokasi');
            $table->foreignId('id_kategori')->references('id_kategori')->on('kategori')->cascadeOnDelete();
            $table->string('nama', 50);
            $table->string('alamat', 150);
            $table->string('longitude', 30);
            $table->string('latitude', 30);
            $table->string('foto', 100);
            $table->json('galeri_foto')->nullable();
            $table->text('deskripsi');
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
        Schema::dropIfExists('lokasi');
    }
};
