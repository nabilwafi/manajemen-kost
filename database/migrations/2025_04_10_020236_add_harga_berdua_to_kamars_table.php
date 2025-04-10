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
        Schema::table('kamars', function (Blueprint $table) {
            $table->unsignedBigInteger('harga_kamar_berdua')->nullable()->after('harga_kamar');
        });
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('kamars', function (Blueprint $table) {
            $table->dropColumn('harga_kamar_berdua');
        });
    }
};
