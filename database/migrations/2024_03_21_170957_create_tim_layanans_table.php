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
        Schema::disableForeignKeyConstraints();

        Schema::create('tim_layanans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('layanan_id')->constrained("layanans")->onDelete("cascade");
            $table->string('tl_nama');
            $table->enum('tl_status', ["tersedia", "tidak"])->default("tersedia");
            $table->string('tl_slug');
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tim_layanans');
    }
};
