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

        Schema::create('h_detail_transaksi_alat_barangs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('Transaksi_alat_barang_id')->constrained('transaksi_alat_barangs');
            $table->decimal('hdtab_sub_total', 10, 2);
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('h_detail_transaksi_alat_barangs');
    }
};
