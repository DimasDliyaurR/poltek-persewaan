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

        Schema::create('alat_barangs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('satuan_alat_barang_id')->constrained("satuan_alat_barangs");
            $table->string('ab_nama');
            $table->string('ab_foto');
            $table->string('ab_keterangan');
            $table->string('ab_tarif');
            $table->integer('ab_qty');
            $table->enum('ab_status', ["tersedia", "tidak"]);
            $table->string('ab_slug');
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alat_barangs');
    }
};
