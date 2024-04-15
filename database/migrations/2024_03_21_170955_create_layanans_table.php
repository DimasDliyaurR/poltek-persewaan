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

        Schema::create('layanans', function (Blueprint $table) {
            $table->id();
            $table->string('l_foto');
            $table->string('l_nama');
            $table->integer('l_tarif');
            $table->boolean('l_personil')->nullable();
            $table->enum('l_satuan', ["jam", "minggu", "bulan", "kegiatan"]);
            $table->enum('l_status', ["tersedia", "tidak"])->default("tersedia");
            $table->text('l_deskripsi');
            $table->string('l_slug');
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('layanans');
    }
};
