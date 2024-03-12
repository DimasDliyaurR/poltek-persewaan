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

        Schema::create('gedung_laps', function (Blueprint $table) {
            $table->id();
            $table->string('gl_foto');
            $table->string('gl_nama');
            $table->string('gl_keterangan');
            $table->string('gl_tarif');
            $table->string('gl_satuan_gedung');
            $table->integer('gl_kapasitas_gedung');
            $table->string('gl_ukuran_gedung');
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gedung_laps');
    }
};
