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

        Schema::create('r_detail_transaksi_gedungs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('detail_transaksi_id')->constrained('h_detail_transaksi_gedungs');
            $table->foreignId('Property_gedung_id')->constrained('property_gedungs');
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
        Schema::dropIfExists('r_detail_transaksi_gedungs');
    }
};
