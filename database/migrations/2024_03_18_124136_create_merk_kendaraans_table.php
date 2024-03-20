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

        Schema::create('merk_kendaraans', function (Blueprint $table) {
            $table->id();
            $table->string('mk_foto');
            $table->string('mk_merk');
            $table->string('mk_seri');
            $table->decimal('mk_tarif', 8, 2);
            $table->string('mk_kapasitas');
            $table->text('mk_deskripsi');
            $table->string('mk_bahan_bakar');
            $table->string('mk_slug');
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('merk_kendaraans');
    }
};
