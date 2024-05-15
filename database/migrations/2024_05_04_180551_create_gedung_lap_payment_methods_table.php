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
        Schema::create('gedung_lap_payment_methods', function (Blueprint $table) {
            $table->foreignId("gedung_lap_id")->constrained("gedung_laps")->onDelete("CASCADE");
            $table->boolean("is_dp");
            $table->integer("tarif_dp");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gedung_lap_payment_methods');
    }
};
