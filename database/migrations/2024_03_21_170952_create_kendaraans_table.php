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

        Schema::create('kendaraans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('merk_kendaraan_id')->constrained('merk_kendaraans');
            $table->string('k_plat');
            $table->integer('k_urutan_prioritas')->nullable();
            $table->enum('k_status', ["tersedia", "tidak"]);
            $table->string('k_slug');
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kendaraans');
    }
};
