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
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('slug', 125);
            $table->string('nama_kamar', 125);
            $table->enum('jenis_kamar', ['Putra', 'Putri', 'Campur']);
            $table->string('luas_kamar', 125);
            $table->integer('stok_kamar');
            $table->integer('sisa_kamar');
            $table->integer('harga_kamar');
            $table->integer('deposit');
            $table->integer('biaya_admin');
            $table->string('ket_lain', 125)->nullable();
            $table->string('ket_biaya', 125)->nullable();
            $table->string('desc', 125)->nullable();
            $table->enum('kategori', ['Kost', 'Apartment']);
            $table->enum('book', ['0', '1']);
            $table->enum('listrik', ['0', '1']);
            $table->string('province_id', 125);
            $table->string('regency_id', 125);
            $table->string('district_id', 125);
            $table->string('bg_foto', 125);
            $table->boolean('status')->default(0);
            $table->boolean('is_active')->default(1);
            $table->text('desc_rooms')->nullable();
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
