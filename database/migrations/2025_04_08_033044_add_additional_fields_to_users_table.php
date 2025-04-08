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
        Schema::table('users', function (Blueprint $table) {
            $table->string('no_ktp')->nullable();
            $table->string('nama_kampus_kantor')->nullable();
            $table->string('alamat_kampus_kantor')->nullable();
            $table->string('nama_keluarga')->nullable();
            $table->string('alamat_keluarga')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'no_ktp',
                'nama_kampus_kantor',
                'alamat_kampus_kantor',
                'nama_keluarga',
                'alamat_keluarga',
            ]);
        });
    }
};
