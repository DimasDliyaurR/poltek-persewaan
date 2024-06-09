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

        Schema::create('transaksi_asramas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('promo_id')->nullable()->constrained();
            $table->string('kode_invoice')->nullable();
            $table->string('code_unique');
            $table->dateTime('ta_tanggal_sewa')->default(now());
            $table->dateTime('ta_check_in');
            $table->dateTime('ta_check_out');
            $table->bigInteger('ta_sub_total')->nullable();
            $table->string('ta_snap_token')->nullable();
            $table->dateTime('tanggal_transaksi')->nullable();
            $table->enum('status', ["belum bayar", "terbayar", "kadaluarsa", "batal"])->default("belum bayar");
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi_asramas');
    }
};
