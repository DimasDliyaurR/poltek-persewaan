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
        Schema::create('rating_layanans', function (Blueprint $table) {
            $table->id();
            $table->foreignId("layanan_id")->constrained("layanans");
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
        Schema::dropIfExists('rating_layanans');
    }
};
