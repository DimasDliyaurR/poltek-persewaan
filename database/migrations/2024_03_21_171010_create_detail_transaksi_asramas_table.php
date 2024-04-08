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

        Schema::create('asrama_transaksi_asrama', function (Blueprint $table) {
            $table->id();
            $table->foreignId('transaksi_asrama_id')->constrained('transaksi_asramas');
            $table->foreignId('tipe_asrama_id')->constrained("tipe_asramas");
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
