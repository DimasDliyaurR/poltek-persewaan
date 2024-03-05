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

        Schema::create('transaksi_gedungs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('User_id')->constrained('users');
            $table->foreignId('Gedung_lap_id')->constrained('gedung_laps');
            $table->string('tg_tujuan');
            $table->dateTime('tg_tanggal_sewa');
            $table->dateTime('tg_tanggal_kembali');
            $table->timestamp('tg_tanggal_pelaksanaan');
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi_gedungs');
    }
};
