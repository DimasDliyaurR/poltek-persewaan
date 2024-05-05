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
        Schema::create('merk_kendaraan_payment_methods', function (Blueprint $table) {
            $table->foreignId("merk_kendaraan_id")->constrained("merk_kendaraans")->onDelete("CASCADE");
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
        Schema::dropIfExists('kendaraan_payment_methods');
    }
};
