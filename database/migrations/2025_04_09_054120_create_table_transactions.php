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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->text('key');
            $table->string('transaction_number', 125);
            $table->foreignId('kamar_id')->constrained('kamars');
            $table->foreignId('user_id')->constrained('users');
            $table->integer('pemilik_id');
            $table->integer('lama_sewa');
            $table->integer('hari');
            $table->integer('harga_kamar');
            $table->integer('harga_total');
            $table->string('tgl_sewa', 125);
            $table->string('end_date_sewa', 125);
            $table->enum('status', ['Pending', 'Proses', 'Done', 'Cancel', 'Reject'])->default('Pending');
            $table->string('approved_by_user', 125)->nullable();
            $table->timestamps();

            $table->index('kamar_id', 'transactions_kamar_id_foreign');
            $table->index('user_id', 'transactions_user_id_foreign');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
