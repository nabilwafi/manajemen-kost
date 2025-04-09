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
        Schema::create('promos', function (Blueprint $table) {
            $table->id(); // bigint unsigned AUTO_INCREMENT
            $table->unsignedInteger('kamar_id');
            $table->unsignedInteger('pemilik_id');
            $table->string('harga_promo', 125);
            $table->enum('status', ['0', '1']);
            $table->string('keterangan', 125)->nullable();
            $table->string('start_date_promo', 125)->nullable();
            $table->string('end_date_promo', 125)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('promos');
    }
};
