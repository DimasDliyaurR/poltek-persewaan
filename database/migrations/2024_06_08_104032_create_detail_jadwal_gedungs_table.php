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
        Schema::create('detail_jadwal_gedungs', function (Blueprint $table) {
            $table->id();
            $table->foreignId("gedung_lap_id")->constrained("gedung_laps");
            $table->foreignId("jadwal_id")->constrained("jadwal_gedungs");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_jadwal_gedungs');
    }
};
