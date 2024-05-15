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

        Schema::create('detail_fasilitas_asramas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tipe_asrama_id')->constrained("tipe_asramas")->onDelete("cascade");
            $table->foreignId('fasilitas_asrama_id')->constrained('fasilitas_asramas')->onDelete("cascade");
            $table->enum('dfa_status', ["include", "pilihan"]);
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_fasilitas_asramas');
    }
};
