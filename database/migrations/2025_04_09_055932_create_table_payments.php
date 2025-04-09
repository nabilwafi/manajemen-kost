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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('transaction_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('kamar_id');

            $table->enum('type_transfer', ['Bank', 'E-Wallet'])->nullable();
            $table->string('nama_bank', 125)->nullable();
            $table->string('nama_pemilik', 125)->nullable();
            $table->enum('status', ['Pending', 'Success', 'Cancel'])->default('Pending');
            $table->string('bank_tujuan', 30)->nullable();
            $table->integer('jumlah_bayar')->nullable();
            $table->string('tgl_transfer', 125)->nullable();
            $table->string('bukti_bayar', 125)->nullable();

            $table->timestamps();

            $table->foreign('transaction_id')
                ->references('id')->on('transactions')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('kamar_id')
                ->references('id')->on('kamars')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
