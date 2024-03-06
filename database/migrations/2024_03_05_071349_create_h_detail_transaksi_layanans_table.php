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

        Schema::create('h_detail_transaksi_layanans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('Transaksi_layanan_id')->constrained();
            $table->integer('hdtl_sub_total');
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('h_detail_transaksi_layanans');
    }
};
