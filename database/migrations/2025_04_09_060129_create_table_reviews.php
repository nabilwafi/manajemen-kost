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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('transaksi_id');
            $table->unsignedBigInteger('pemilik_id');
            $table->unsignedBigInteger('kamar_id');
            $table->enum('rating', ['1', '2', '3', '4', '5']);
            $table->text('ulasan')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('transaksi_id')->references('id')->on('transactions')->onDelete('cascade');
            $table->foreign('pemilik_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('kamar_id')->references('id')->on('kamars')->onDelete('cascade');

            $table->index('user_id');
            $table->index('transaksi_id');
            $table->index('pemilik_id');
            $table->index('kamar_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
