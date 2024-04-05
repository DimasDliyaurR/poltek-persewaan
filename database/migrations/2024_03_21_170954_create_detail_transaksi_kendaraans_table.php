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

        Schema::create('kendaraan_transaksi_kendaraan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('transaksi_kendaraan_id')->constrained('transaksi_kendaraans');
            $table->foreignId('kendaraan_id')->constrained();
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_transaksi_kendaraans');
    }
};
