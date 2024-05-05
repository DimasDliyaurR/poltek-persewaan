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
        Schema::create('alat_barang_payment_methods', function (Blueprint $table) {
            $table->foreignId("alat_barang_id")->constrained("alat_barangs")->onDelete("CASCADE");
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
        Schema::dropIfExists('alat_barang_payment_methods');
    }
};
