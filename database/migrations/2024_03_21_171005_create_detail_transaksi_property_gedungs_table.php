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

        Schema::create('detail_transaksi_property_gedungs', function (Blueprint $table) {
            $table->foreignId('transaksi_gedung_id')->constrained('transaksi_gedungs');
            $table->foreignId('property_gedung_id')->constrained('property_gedungs');
            $table->integer('qty');
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_transaksi_property_gedungs');
    }
};
