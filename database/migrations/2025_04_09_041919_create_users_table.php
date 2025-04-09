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
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // bigint unsigned, auto_increment, primary key
            $table->string('name', 125);
            $table->string('email', 125)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->enum('role', ['Pemilik', 'Pencari', 'Admin'])->nullable();
            $table->string('credit', 125)->default('20');
            $table->string('no_wa', 20)->nullable();
            $table->text('foto')->nullable();
            $table->string('password', 125);
            $table->rememberToken();
            $table->timestamps(); // created_at & updated_at

            $table->string('alamat_ktp', 125)->nullable();
            $table->string('kontak_darurat', 125)->nullable();
            $table->string('hubungan_kontak', 125)->nullable();
            $table->string('pekerjaan', 125)->nullable();
            $table->text('penyakit')->nullable();
            $table->string('agama', 125)->nullable();
            $table->string('buku_nikah', 125)->nullable();
            $table->string('ktp_upload', 125)->nullable();
            $table->string('verified', 125)->nullable();
            $table->string('no_ktp', 125)->nullable();
            $table->string('nama_kampus_kantor', 125)->nullable();
            $table->string('alamat_kampus_kantor', 125)->nullable();
            $table->string('nama_keluarga', 125)->nullable();
            $table->string('alamat_keluarga', 125)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
