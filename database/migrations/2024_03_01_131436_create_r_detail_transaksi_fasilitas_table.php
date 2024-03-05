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

        Schema::create('r_detail_transaksi_fasilitas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('detail_fasilitas_id')->constrained('H_detail_transaksi_asramas');
            $table->foreignId('Fasilitas_asrama_id')->constrained('fasilitas_asramas');
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('r_detail_transaksi_fasilitas');
    }
};
