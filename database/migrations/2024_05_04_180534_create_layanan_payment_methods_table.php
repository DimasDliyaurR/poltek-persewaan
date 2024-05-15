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
        Schema::create('layanan_payment_methods', function (Blueprint $table) {
            $table->foreignId("layanan_id")->constrained("layanans")->onDelete("CASCADE");
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
        Schema::dropIfExists('layanan_payment_methods');
    }
};
