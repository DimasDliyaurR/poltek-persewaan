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

        Schema::create('fasilitas_asramas', function (Blueprint $table) {
            $table->id();
            $table->string('fa_icon');
            $table->string('fa_nama');
            $table->integer('fa_tarif');
            $table->enum('fa_status', ["tersedia", "tidak"]);
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fasilitas_asramas');
    }
};
