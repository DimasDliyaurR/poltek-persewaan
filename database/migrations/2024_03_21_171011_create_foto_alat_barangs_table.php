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

        Schema::create('foto_alat_barangs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('alat_barang_id')->constrained('alat_barangs')->onDelete("cascade");
            $table->string('fab_foto');
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('foto_alat_barangs');
    }
};
