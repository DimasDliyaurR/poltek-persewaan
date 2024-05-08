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
        Schema::create('asrama_payment_methods', function (Blueprint $table) {
            $table->foreignId("tipe_asrama_id")->constrained("tipe_asramas")->onDelete("CASCADE");
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
        Schema::dropIfExists('asrama_payment_methods');
    }
};
