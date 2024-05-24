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
        Schema::create('rating_merk_kendaraans', function (Blueprint $table) {
            $table->id();
            $table->foreignId("merk_kendaraan_id")->constrained("merk_kendaraans");
            $table->foreignId("user_id")->constrained("users");
            $table->integer("nilai");
            $table->text("ulasan");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rating_merk_kendaraans');
    }
};
