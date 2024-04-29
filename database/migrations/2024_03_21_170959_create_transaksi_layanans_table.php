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

        Schema::create('transaksi_layanans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained("users");
            $table->foreignId('promo_id')->nullable()->constrained("promos");
            $table->string('tl_title');
            $table->string('code_unique');
            $table->dateTime('tl_tanggal_sewa');
            $table->dateTime('tl_tanggal_pelaksanaan');
            $table->integer('tl_durasi_sewa');
            $table->string('tl_tujuan');
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi_layanans');
    }
};
