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
        Schema::disableForeignKeyConstraints();

        Schema::create('detail_transaksi_asramas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('transaksi_asrama_id')->constrained('transaksi_asramas');
            $table->foreignId('asrama_id')->constrained("asramas");
            $table->integer('dta_harga');
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_transaksi_asramas');
    }
};
