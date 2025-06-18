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
        Schema::create('hotels', function (Blueprint $table) {
            $table->id();
            $table->string('gambar'); // Mengubah dari blob menjadi string untuk path gambar
            $table->string('nama');
            $table->float('rating')->default(0); // Menambahkan default value
            $table->unsignedBigInteger('kota_id'); // Menambahkan foreign key untuk relasi dengan tabel kota
            $table->foreign('kota_id')->references('id')->on('kotas')->onDelete('cascade'); // Menambahkan foreign key constraint
            $table->text('lokasi'); // Menambahkan relasi ke tabel kota
            $table->json('fasilitas'); // Mengubah dari array menjadi json
            $table->text('tentang');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hotels');
    }
};
