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

        Schema::create('detail_transaksi_gedungs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('transaksi_gedung_id')->constrained('transaksigedungs');
            $table->foreignId('gedung_lap_id')->constrained('gedunglaps');
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_transaksi_gedungs');
    }
};
