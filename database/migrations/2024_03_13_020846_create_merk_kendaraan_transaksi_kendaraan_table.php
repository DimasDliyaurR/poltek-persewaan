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

        Schema::create('merk_kendaraan_transaksi_kendaraan', function (Blueprint $table) {
            $table->foreignId('merk_kendaraan_id');
            $table->foreignId('transaksi_kendaraan_id');
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('merk_kendaraan_transaksi_kendaraan');
    }
};
