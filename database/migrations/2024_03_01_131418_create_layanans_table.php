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
            $table->string('foto_layanan');
            $table->string('l_nama');
            $table->integer('l_tarif');
            $table->boolean('l_personil');
            $table->enum('l_satuan', ["jam","minggu","bulan"]);
            $table->enum('l_status', ["tersedia","tidak"]);
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
