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
        Schema::create('detail_kategori_promos', function (Blueprint $table) {
            $table->id();
            $table->foreignId("gedung_lap_id")->constrained("gedung_laps")->onDelete("CASCADE");
            $table->foreignId("layanan_id")->constrained("layanans")->onDelete("CASCADE");
            $table->foreignId("asrama_id")->constrained("asramas")->onDelete("CASCADE");
            $table->foreignId("alat_barang_id")->constrained("alat_barangs")->onDelete("CASCADE");
            $table->foreignId("kendaraans_id")->constrained("kendaraans")->onDelete("CASCADE");
            $table->foreignId("promo_id")->constrained("promos")->onDelete("CASCADE");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_kategori_promos');
    }
};
