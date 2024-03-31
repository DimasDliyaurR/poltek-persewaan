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

        Schema::create('promos', function (Blueprint $table) {
            $table->id();
            $table->string("p_judul");
            $table->string("p_foto");
            $table->string("p_kode");
            $table->integer("p_isi");
            $table->enum("p_tipe", ["fixed", "percent"]);
            $table->boolean("p_is_aktif");
            $table->text("p_deskripsi");
            $table->dateTime("p_mulai");
            $table->dateTime("p_kadaluarsa");
            $table->integer("p_jumlah");
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('promos');
    }
};
