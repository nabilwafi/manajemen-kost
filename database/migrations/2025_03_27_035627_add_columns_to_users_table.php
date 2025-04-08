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

            $table->string('alamat_ktp')->nullable();
            $table->string('kontak_darurat')->nullable();
            $table->string('hubungan_kontak')->nullable(); 

            // Profil tambahan
            $table->string('pekerjaan')->nullable();
            $table->text('penyakit')->nullable();
            $table->string('agama')->nullable();

            // Upload Dokumen
            $table->string('buku_nikah')->nullable();
            $table->string('ktp_upload')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'alamat_ktp', 'cp', 'cp_emer', 'hubungan_kontak',
                'durasi_kontrak', 'biaya_kost', 'tanggal_checkin', 'setuju_kontrak', 'ttd_elektronik',
                'profile', 'pekerjaan', 'penyakit', 'agama',
                'buku_nikah', 'ktp_upload'
            ]);
        });
    }
};
