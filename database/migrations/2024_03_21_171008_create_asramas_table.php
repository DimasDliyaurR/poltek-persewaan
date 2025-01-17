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

        Schema::create('asramas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tipe_asrama_id')->constrained("tipe_asramas")->onDelete("CASCADE");
            $table->string('a_nama_ruangan');
            $table->string('a_slug');
            $table->enum('a_status', ["tersedia", "tidak tersedia"]);
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asramas');
    }
};
