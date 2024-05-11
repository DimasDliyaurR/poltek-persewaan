<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use App\Models\Event;
use App\Models\Promo;
use App\Models\Asrama;
use App\Models\Profile;
use App\Models\Kendaraan;
use App\Models\TipeAsrama;
use Illuminate\Support\Str;
use App\Models\MerkKendaraan;
use App\Models\FasilitasAsrama;
use Illuminate\Database\Seeder;
use Database\Seeders\EventSeeder;
use App\Models\TransaksiKendaraan;
use Illuminate\Support\Facades\DB;
use App\Models\AsramaPaymentMethod;
use App\Models\DetailFasilitasAsrama;
use App\Models\DetailTransaksiKendaraan;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        /**
         * _____________________________________________________________________________
         * |                                                                            |
         * |                             User Profile                                   |
         * |                                                                            |
         * |****************************************************************************|
         * |
         * |
         * |
         */
        $user = User::create([
            "username" => "dimas12",
            "email" => "dimasdliyaurrahman@gmail.com",
            "level" => "admin",
            "password" => "dimas12",
        ]);

        Profile::create([
            "user_id" => $user->id,
            "slug" => Str::slug("Dimas Dliyaur Rahman"),
            "nama_lengkap" => "Dimas Dliyaur Rahman",
            "foto_ktp" => "none",
            "alamat" => "Jl. Raya Telang, Perumahan Telang Inda, Telang, Kec. Kamal, Kabupaten Bangkalan, Jawa Timur 69162",
            "no_telp" => "083854691092",
        ]);

        /**
         * _____________________________________________________________________________
         * |                                                                            |
         * |                             Asrama                                         |
         * |                                                                            |
         * |****************************************************************************|
         * |
         * |
         * |
         */
        DB::table("fasilitas_asramas")->insert([
            [
                "id" => 1,
                "fa_icon" => "bath",
                "fa_nama" => "Bak Mandi",
                "fa_tarif" => 20000,
                "fa_status" => "tersedia",
                "created_at" => now(),
                "updated_at" => now(),
            ], [
                "id" => 2,
                "fa_icon" => "shower",
                "fa_nama" => "shower",
                "fa_tarif" => 20000,
                "fa_status" => "tersedia",
                "created_at" => now(),
                "updated_at" => now(),
            ]
        ]);

        DB::table("tipe_asramas")->insert([
            "id" => 1,
            "ta_foto" => "asrama/furR0LYXqmRVRD7q5qXO3WkU6Tw37RtkBLnmVwed.png",
            "ta_nama" => "Tipe Deluxxe with swift room",
            "ta_tarif" => 700000,
            "ta_kapasitas" => 2,
            "ta_deskripsi" => "<p><strong>Tipe Deluxe Room</strong> adalah salah satu jenis ruangan yang biasanya ditawarkan oleh pengi
    napan, terutama hotel, saat Anda sedang berlibur. Istilah ini lebih sering ditemui di hotel sebagai pembeda dengan tipe kamar l
    ainnya. Berikut beberapa informasi mengenai Deluxe Room:</p><p>&nbsp;</p><p><strong>1. Pengertian Deluxe Room</strong>:<br>&nbs
    p;</p><p>- Deluxe Room adalah tipe kamar hotel yang bisa dipilih saat menginap.<br>- Kamar ini memiliki fasilitas yang lebih un
    ggul dibandingkan ruangan standard.<br>- <strong>Ukuran ruangan Deluxe Room lebih besar </strong>daripada ruangan standar, sehi
    ngga cocok untuk yang sudah berkeluarga atau ingin lebih memanjakan diri saat liburan.<br>- <strong>Fasilitas </strong>di kamar
     Deluxe Room juga lebih lengkap, seperti <strong>akses khusus ke fasilitas olahraga, kolam renang, dan sebagainya</strong>.<br>
    &nbsp;</p><p><strong>2. Perbedaan dengan Standard Room:</strong></p><p><br>- <strong>Standard Room </strong>menawarkan fasilita
    s dan pelayanan yang lebih mendasar daripada Deluxe Room.<br>- Ukuran kamar Standard Room lebih kecil dan fasilitasnya lebih se
    derhana.<br>- Tarif Standard Room juga lebih terjangkau dibanding Deluxe Room, cocok bagi yang ingin berlibur dengan budget ter
    batas.</p>",
            "ta_slug" => "tipe-deluxxe-with-swift-room",
            "created_at" => now(),
            "updated_at" => now(),
            "deleted_at" => null,
        ]);

        DB::table("asramas")->insert([
            [
                "id" => 1,
                "tipe_asrama_id" => 1,
                "a_nama_ruangan" => "Ruangan 403 Esxtra doeble Avenged Bad",
                "a_slug" => "ruangan-403-esxtra-doeble-avenged-bad",
                "a_status" => "tersedia",
                "created_at" => now(),
                "updated_at" => now(),
                "deleted_at" => null,
            ], [
                "id" => 2,
                "tipe_asrama_id" => 1,
                "a_nama_ruangan" => "Ruangan 403 Esxtra doeble bath",
                "a_slug" => "ruangan-403-esxtra-doeble-bath",
                "a_status" => "tersedia",
                "created_at" => now(),
                "updated_at" => now(),
                "deleted_at" => null,
            ]
        ]);

        DB::table("asrama_payment_methods")->insert([
            "tipe_asrama_id" => 1,
            "is_dp" => 1,
            "tarif_dp" => 300000,
            "created_at" => now(),
            "updated_at" => now(),
        ]);

        DB::table("detail_fasilitas_asramas")->insert([
            [
                "id" => 1,
                "tipe_asrama_id" => 1,
                "fasilitas_asrama_id" => 1,
                "dfa_status" => "include",
                "created_at" => now(),
                "updated_at" => now(),
            ], [
                "id" => 2,
                "tipe_asrama_id" => 1,
                "fasilitas_asrama_id" => 2,
                "dfa_status" => "pilihan",
                "created_at" => now(),
                "updated_at" => now(),
            ]
        ]);

        /**
         * _____________________________________________________________________________
         * |                                                                            |
         * |                             Promo                                          |
         * |                                                                            |
         * |****************************************************************************|
         * |
         * |
         * |
         */
        DB::table("promos")->insert([
            "id" => 1,
            "p_judul" => "Promo Akhir Tahun",
            "p_foto" => "promo/5oUUOwarsn9M1fQdOsfq6MKoHENzWpFcoLk0JKXM.png",
            "p_kode" => "456q588",
            "p_isi" => 50,
            "p_tipe" => "percent",
            "p_is_umum" => 1,
            "p_is_aktif" => 1,
            "p_deskripsi" => "Promo ini berlaku hanya sampai akhir tahun",
            "p_mulai" => "2024-05-18 00:00:00",
            "p_kadaluarsa" => "2024-05-19 00:00:00",
            "p_jumlah" => 0,
            "p_tipe_stok" => "unlimited",
            "p_kategori" => "All",
            "created_at" => now(),
            "updated_at" => now(),
            "deleted_at" => null,
        ]);
    }
}
