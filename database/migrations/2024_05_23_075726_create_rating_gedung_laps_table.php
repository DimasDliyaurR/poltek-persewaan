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
        Schema::create('rating_gedung_laps', function (Blueprint $table) {
            $table->id();
            $table->foreignId("gedung_lap_id")->constrained("gedung_laps");
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
        Schema::dropIfExists('rating_gedung_laps');
    }
};
