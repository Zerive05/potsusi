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
        Schema::create('kamars', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('hotel_id'); // Menambahkan foreign key untuk relasi dengan tabel hotel
            $table->foreign('hotel_id')->references('id')->on('hotels')->onDelete('cascade');
            $table->string('nama_kamar');
            $table->string('tipe_kamar');
            $table->integer('harga');
            $table->integer('kapasitas'); // Jumlah orang yang bisa menginap
            $table->text('deskripsi'); // Deskripsi kamar
            $table->json('fasilitas'); // Fasilitas kamar dalam format JSON
            $table->enum('status', ['tersedia', 'dipesan'])->default('tersedia'); // Status ketersediaan kamar
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kamars');
    }
};
