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
            $table->string('code_unique');
            $table->dateTime('tl_tanggal_sewa');
            $table->dateTime('tl_tanggal_pelaksanaan');
            $table->integer('tl_durasi_sewa');
            $table->dateTime('tl_tanggal_kembali');
            $table->bigInteger('tl_sub_total')->nullable();
            $table->string('tl_snap_token')->nullable();
            $table->dateTime('tanggal_transaksi')->nullable();
            $table->string('tl_tujuan');
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
        Schema::dropIfExists('transaksi_layanans');
    }
};
