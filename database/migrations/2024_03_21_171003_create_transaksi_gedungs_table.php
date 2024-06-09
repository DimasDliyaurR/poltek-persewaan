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

        Schema::create('transaksi_gedungs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained("users");
            $table->foreignId('promo_id')->nullable()->constrained("promos");
            $table->string('kode_invoice')->nullable();
            $table->string('code_unique')->unique();
            $table->string('tg_tujuan');
            $table->dateTime('tg_tanggal_sewa');
            $table->dateTime('tg_tanggal_pelaksanaan');
            $table->string('tg_satuan');
            $table->dateTime('tg_durasi')->nullable();
            $table->dateTime('tg_tanggal_kembali')->nullable();
            $table->dateTime('tg_jam_mulai')->nullable();
            $table->dateTime('tg_jam_akhir')->nullable();
            $table->bigInteger('tg_sub_total')->nullable();
            $table->dateTime('tanggal_transaksi')->nullable();
            $table->string('tg_snap_token')->nullable();
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
        Schema::dropIfExists('transaksi_gedungs');
    }
};
