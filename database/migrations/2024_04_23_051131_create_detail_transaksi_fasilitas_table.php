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
        Schema::create('detail_transaksi_fasilitas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('transaksi_asrama_id')->constrained('transaksi_asramas');
            $table->foreignId('fasilitas_asrama_id')->constrained("fasilitas_asramas");
            $table->integer('dtf_harga');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_transaksi_fasilitas');
    }
};
