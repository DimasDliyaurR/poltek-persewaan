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

        Schema::create('detail_transaksi_alat_barangs', function (Blueprint $table) {
            $table->foreignId('transaksi_alat_barang_id')->constrained('transaksi_alat_barangs');
            $table->foreignId('alat_barang_id')->constrained('alat_barangs');
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_transaksi_alat_barangs');
    }
};
