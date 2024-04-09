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
            $table->string('a_nama');
            $table->string('a_foto');
            $table->string('a_keterangan');
            $table->string('a_tarif');
            $table->integer('a_qty');
            $table->enum('a_status', ["tersedia", "tidak"]);
            $table->foreignId('satuan_alat_barang_id')->constrained("satuan_alat_barangs");
            $table->string('a_slug');
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
