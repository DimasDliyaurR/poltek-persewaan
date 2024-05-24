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
        Schema::create('like_tipe_asramas', function (Blueprint $table) {
            $table->id();
            $table->foreignId("rating_tipe_asrama_id")->constrained("rating_tipe_asramas");
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
        Schema::dropIfExists('like_asramas');
    }
};
