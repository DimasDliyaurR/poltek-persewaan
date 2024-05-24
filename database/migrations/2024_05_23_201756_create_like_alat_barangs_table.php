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
        Schema::create('like_alat_barangs', function (Blueprint $table) {
            $table->id();
            $table->foreignId("rating_alat_barang_id")->constrained("rating_alat_barangs");
            $table->foreignId("user_id")->constrained("users");
            $table->boolean("is_like")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('like_alat_barangs');
    }
};
