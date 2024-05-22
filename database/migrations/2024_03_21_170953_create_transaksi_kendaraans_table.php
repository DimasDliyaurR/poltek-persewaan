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

        Schema::create('transaksi_kendaraans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained("users");
            $table->foreignId('promo_id')->nullable()->constrained("promos");
            $table->string('code_unique');
            $table->datetime('tk_tanggal_sewa');
            $table->string('tk_durasi');
            $table->datetime('tk_pelaksanaan');
            $table->dateTime('tk_tanggal_kembali');
            $table->string('tk_snap_token')->nullable();
            $table->bigInteger('tk_sub_total')->nullable();
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
        Schema::dropIfExists('transaksi_kendaraans');
    }
};
