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
        Schema::create('kondisi_barang', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('transaction_id')->constrained()->onDelete('cascade');
            $table->enum('type', ['masuk', 'keluar'])->default('masuk');
            $table->string('signature_path');
            $table->string('barang_1')->nullable();
            $table->string('barang_2')->nullable();
            $table->string('barang_3')->nullable();
            $table->string('barang_4')->nullable();
            $table->string('barang_5')->nullable();
            $table->string('barang_6')->nullable();
            $table->string('barang_7')->nullable();
            $table->string('barang_8')->nullable();
            $table->string('barang_9')->nullable();
            $table->string('barang_10')->nullable();
            $table->string('barang_11')->nullable();
            $table->string('barang_12')->nullable();
            $table->string('barang_13')->nullable();
            $table->string('barang_14')->nullable();
            $table->string('barang_15')->nullable();
            $table->string('barang_16')->nullable();
            $table->string('barang_17')->nullable();
            $table->string('barang_18')->nullable();
            $table->string('barang_19')->nullable();
            $table->string('barang_20')->nullable();
            $table->string('barang_21')->nullable();
            $table->string('barang_22')->nullable();
            $table->string('barang_23')->nullable();
            $table->string('barang_24')->nullable();
            $table->string('barang_25')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kondisi_masuk_barang');
    }
};
