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
        Schema::create('pesans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('kamar_id');
            $table->date('check_in');
            $table->date('check_out');
            $table->enum('metode_pembayaran', ['credit_card', 'bank_transfer', 'e-wallet',])->default('credit_card');
            $table->decimal('total_harga', 10, 2);
            $table->string('kode_pembayaran')->nullable(); // Kolom baru
            $table->string('status')->default('pending'); // pending, confirmed, cancelled
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('kamar_id')->references('id')->on('kamars')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesans');
    }
};
