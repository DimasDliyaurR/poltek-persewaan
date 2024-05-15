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
        Schema::create('tipe_asramas', function (Blueprint $table) {
            $table->id();
            $table->string("ta_foto");
            $table->string("ta_nama");
            $table->integer("ta_tarif");
            $table->integer("ta_kapasitas");
            $table->text("ta_deskripsi");
            $table->string("ta_slug");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tipe_asramas');
    }
};
