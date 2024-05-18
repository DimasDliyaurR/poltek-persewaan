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

        DB::table("tipe_asramas")->insert(
            [
                [
                    "id" => 1,
                    "ta_foto" => "asrama/5.png",
                    "ta_nama" => "Tipe Deluxe with swift room",
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
                ],
                [
                    "id" => 2,
                    "ta_foto" => "asrama/barack_1.png",
                    "ta_nama" => "Tipe Barak",
                    "ta_tarif" => 500000,
                    "ta_kapasitas" => 12,
                    "ta_deskripsi" => "<p><strong>Tipe Barak</strong> adalah salah satu jenis ruangan yang . Istilah ini lebih sering ditemui di hotel sebagai pembeda dengan tipe kamar l
    ainnya. Berikut beberapa informasi mengenai Deluxe Room:</p><p>&nbsp;</p><p><strong>1. Pengertian Deluxe Room</strong>:<br>&nbs
    p;</p><p>- Deluxe Room adalah tipe kamar hotel yang bisa dipilih saat menginap.<br>- Kamar ini memiliki fasilitas yang lebih un
    ggul dibandingkan ruangan standard.<br>- <strong>Ukuran ruangan Deluxe Room lebih besar </strong>daripada ruangan standar, sehi
    ngga cocok untuk yang sudah berkeluarga atau ingin lebih memanjakan diri saat liburan.<br>- <strong>Fasilitas </strong>di kamar
     Deluxe Room juga lebih lengkap, seperti <strong>akses khusus ke fasilitas olahraga, kolam renang, dan sebagainya</strong>.<br>
    &nbsp;</p><p><strong>2. Perbedaan dengan Standard Room:</strong></p><p><br>- <strong>Standard Room </strong>menawarkan fasilita
    s dan pelayanan yang lebih mendasar daripada Deluxe Room.<br>- Ukuran kamar Standard Room lebih kecil dan fasilitasnya lebih se
    derhana.<br>- Tarif Standard Room juga lebih terjangkau dibanding Deluxe Room, cocok bagi yang ingin berlibur dengan budget ter
    batas.</p>",
                    "ta_slug" => "tipe-barak",
                    "created_at" => now(),
                    "updated_at" => now(),
                    "deleted_at" => null,
                ],
                [
                    "id" => 3,
                    "ta_foto" => "asrama/trio_1.png",
                    "ta_nama" => "Tipe Barak",
                    "ta_tarif" => 500000,
                    "ta_kapasitas" => 12,
                    "ta_deskripsi" => "<p><strong>Tipe Barak</strong> adalah salah satu jenis ruangan yang . Istilah ini lebih sering ditemui di hotel sebagai pembeda dengan tipe kamar l
    ainnya. Berikut beberapa informasi mengenai Deluxe Room:</p><p>&nbsp;</p><p><strong>1. Pengertian Deluxe Room</strong>:<br>&nbs
    p;</p><p>- Deluxe Room adalah tipe kamar hotel yang bisa dipilih saat menginap.<br>- Kamar ini memiliki fasilitas yang lebih un
    ggul dibandingkan ruangan standard.<br>- <strong>Ukuran ruangan Deluxe Room lebih besar </strong>daripada ruangan standar, sehi
    ngga cocok untuk yang sudah berkeluarga atau ingin lebih memanjakan diri saat liburan.<br>- <strong>Fasilitas </strong>di kamar
     Deluxe Room juga lebih lengkap, seperti <strong>akses khusus ke fasilitas olahraga, kolam renang, dan sebagainya</strong>.<br>
    &nbsp;</p><p><strong>2. Perbedaan dengan Standard Room:</strong></p><p><br>- <strong>Standard Room </strong>menawarkan fasilita
    s dan pelayanan yang lebih mendasar daripada Deluxe Room.<br>- Ukuran kamar Standard Room lebih kecil dan fasilitasnya lebih se
    derhana.<br>- Tarif Standard Room juga lebih terjangkau dibanding Deluxe Room, cocok bagi yang ingin berlibur dengan budget ter
    batas.</p>",
                    "ta_slug" => "tipe-barak",
                    "created_at" => now(),
                    "updated_at" => now(),
                    "deleted_at" => null,
                ],
            ]
        );

        DB::table("detail_foto_tipe_asramas")->insert(
            [
                [
                    "id" => 1,
                    "tipe_asrama_id" => 1,
                    "dfta_foto" => "asrama/6.png",
                ],
                [
                    "id" => 2,
                    "tipe_asrama_id" => 1,
                    "dfta_foto" => "asrama/3.png",
                ],
                [
                    "id" => 3,
                    "tipe_asrama_id" => 1,
                    "dfta_foto" => "asrama/2.png",
                ],
                [
                    "id" => 4,
                    "tipe_asrama_id" => 2,
                    "dfta_foto" => "asrama/barack_2.JPG",
                ],
                [
                    "id" => 5,
                    "tipe_asrama_id" => 2,
                    "dfta_foto" => "asrama/barack_3.JPG",
                ],
                [
                    "id" => 6,
                    "tipe_asrama_id" => 2,
                    "dfta_foto" => "asrama/barack_4.JPG",
                ],
                [
                    "id" => 7,
                    "tipe_asrama_id" => 3,
                    "dfta_foto" => "asrama/trio_2.JPG",
                ],
                [
                    "id" => 8,
                    "tipe_asrama_id" => 3,
                    "dfta_foto" => "asrama/trio_3.JPG",
                ],
            ]
        );

        DB::table("asramas")->insert([
            [
                "id" => 1,
                "tipe_asrama_id" => 1,
                "a_nama_ruangan" => "Ruangan 403 Esxtra Single Avenged Bad",
                "a_slug" => "ruangan-403-esxtra-single-avenged-bad",
                "a_status" => "tersedia",
                "created_at" => now(),
                "updated_at" => now(),
                "deleted_at" => null,
            ], [
                "id" => 2,
                "tipe_asrama_id" => 1,
                "a_nama_ruangan" => "Ruangan 403 Esxtra doeble bad",
                "a_slug" => "ruangan-403-esxtra-doeble-bad",
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

        /**
         * _____________________________________________________________________________
         * |                                                                            |
         * |                             Merk Kendaraan                                 |
         * |                                                                            |
         * |****************************************************************************|
         * |
         * |
         * |
         */
        DB::table("merk_kendaraans")->insert([
            "id" => 1,
            "mk_foto" => "merkKendaraan/bqBGBq2F04cYEWsvhhb10m2CMtUl3wfxswggMiE4.png",
            "mk_merk" => "Bus Mini",
            "mk_seri" => "127167",
            "mk_tarif" => "300000",
            "mk_kapasitas" => "28",
            "mk_deskripsi" => "<p><strong>Bus mini</strong> adalah moda transportasi umum yang sering digunakan untuk
     mengangkut penumpang dalam jumlah yang terbatas. Meskipun ukurannya lebih kecil daripada bus konvensional, b
    us mini tetap nyaman dan praktis digunakan. Berikut beberapa informasi mengenai bus mini:</p><p>&nbsp;</p><p>
    <strong>1. Kapasitas Standar Bus Mini</strong>:<br>- Secara umum, bus mini dapat menampung sekitar 15 hingga 
    30 penumpang.<br>- Jumlah ini lebih sedikit dibandingkan dengan bus konvensional yang mampu mengangkut puluha
    n hingga ratusan penumpang.<br>&nbsp;</p><p><strong>2. Ukuran dan Konfigurasi Tempat Duduk</strong>:</p><p><b
    r>- Bus mini memiliki ukuran lebih kecil dan lebih lincah di jalanan yang sempit.<br>- Beberapa bus mini dile
    ngkapi dengan fasilitas seperti AC, televisi, dan kursi yang empuk.<br>&nbsp;</p><p><strong>3. Tipe Bus Mini<
    /strong>:</p><p><br>- Terdapat beberapa tipe bus mini, antara lain:<br>- MiniBus 9-Seater: Dengan kapasitas 9
     penumpang.<br>- MiniBus 16-Seater: Dengan kapasitas 16 penumpang.<br>- Microbus: Dengan kapasitas yang berva
    riasi1122.<br>&nbsp;</p><p><strong>4. Kelebihan Bus Mini</strong>:<br>Praktis: Cocok untuk perjalanan bersama
     keluarga kecil atau kelompok teman yang tidak terlalu banyak.<br>Efisien: Lebih lincah di jalanan sempit dan
     menghindari kemacetan.<br>Nyaman: Meskipun kapasitas terbatas, tetap memberikan pengalaman perjalanan yang n
    yaman.</p>",
            "mk_bahan_bakar" => "Bensin",
            "mk_slug" => "bus-mini",
            "created_at" => "2024-05-11 21:25:00",
            "updated_at" => "2024-05-11 21:25:00",
        ]);

        DB::table("merk_kendaraan_payment_methods")->insert([
            "merk_kendaraan_id" => 1,
            "is_dp" => 1,
            "tarif_dp" => 300000,
            "created_at" => now(),
            "updated_at" => now(),
        ]);

        DB::table("kendaraans")->insert([
            [
                "id" => 1,
                "merk_kendaraan_id" => 1,
                "k_plat" => "L 37827 GH",
                "k_status" => "tersedia",
                "k_slug" => "l-37827-gh",
                "created_at" => "2024-05-11 21:32:18",
                "updated_at" => "2024-05-11 21:32:18",
            ], [
                "id" => 2,
                "merk_kendaraan_id" => 1,
                "k_plat" => "L 87897 GF",
                "k_status" => "tersedia",
                "k_slug" => "l-87897-gf",
                "created_at" => "2024-05-11 21:32:30",
                "updated_at" => "2024-05-11 21:32:30",
            ]
        ]);

        /**
         * _____________________________________________________________________________
         * |                                                                            |
         * |                             Gedung Lapangan                                |
         * |                                                                            |
         * |****************************************************************************|
         * |
         * |
         * |
         */
        DB::table("gedung_laps")->insert([
            "id" => 1,
            "gl_foto" => "gedungLap/S0wkqHd6B8YJ3rk7czVWAG5uB67nyULXD5Kdheov.png",
            "gl_nama" => "Lapangan coding",
            "gl_keterangan" => "<p><strong>Gedung serba guna </strong>adalah bangunan yang dirancang untuk memenuhi b
erbagai kebutuhan ruang dalam satu lokasi. Berikut beberapa informasi mengenai gedung serba guna:</p><p>&nbsp
;</p><p><strong>1. Fleksibilitas dan Efisiensi</strong>:</p><p><br>- Gedung serba guna merupakan solusi yang 
fleksibel dan efisien karena dapat digunakan untuk berbagai kegiatan atau acara.<br>- Biasanya dirancang agar
 dapat digunakan secara serentak atau terpisah untuk konferensi, pameran, pertemuan bisnis, konser, dan lain-
lain.<br>&nbsp;</p><p><strong>2. Tata Letak yang Efisien</strong>:<br>- Desain tata letak yang efisien sangat
 penting dalam gedung serba guna.<br>- Ruang harus dirancang sedemikian rupa sehingga memaksimalkan penggunaa
n ruang yang tersedia.<br>&nbsp;</p><p><strong>3. Pemisahan Ruang Berdasarkan Fungsi</strong>:<br>&nbsp;</p><
p>- Pemisahan ruang berdasarkan fungsi memudahkan pengguna dalam mengaksesnya.<br>- Ruang dengan fungsi serup
a ditempatkan berdekatan, sementara ruang dengan fungsi berbeda dipisahkan dengan jelas.<br>&nbsp;</p><p><str
ong>4. Penggunaan Ruang Vertikal</strong>:<br>- Gedung serba guna juga mempertimbangkan penggunaan ruang vert
ikal, seperti tangga, lift, atau eskalator.<br>- Ruang vertikal membantu menghubungkan lantai gedung dan memu
dahkan berpindah antar ruangan.</p>",
            "gl_tarif" => "30000",
            "gl_satuan_gedung" => "jam",
            "gl_kapasitas_gedung" => 45,
            "gl_ukuran_gedung" => "45x67 m",
            "gl_slug" => "lapangan-coding",
            "created_at" => "2024-05-12 10:51:52",
            "updated_at" => "2024-05-12 10:51:52",
        ]);

        DB::table("gedung_lap_payment_methods")->insert([
            "gedung_lap_id" => 1,
            "is_dp" => 0,
            "tarif_dp" => 300000,
            "created_at" => "2024-05-12 10:51:52",
            "updated_at" => "2024-05-12 10:51:52",
        ]);

        /**
         * _____________________________________________________________________________
         * |                                                                            |
         * |                                Layanan                                     |
         * |                                                                            |
         * |****************************************************************************|
         * |
         * |
         * |
         */
        DB::table("layanans")->insert([
            "id" => 1,
            "l_foto" => "layanan/1zzQ8ylmhj7SR5B86u3h4wypaOjzzwpXKVCe8cKh.png",
            "l_nama" => "Layanan Coding keliling",
            "l_tarif" => 600000,
            "l_personil" => 0,
            "l_satuan" => "jam",
            "l_status" => "tersedia",
            "l_deskripsi" => "<p><strong>Layanan koding keliling</strong> adalah inisiat
if yang memudahkan para pengembang perangkat lunak untuk mengakses layanan pemro
graman dan bantuan teknis secara langsung di lokasi tertentu. Berikut beberapa i
nformasi mengenai layanan koding keliling:</p><p>&nbsp;</p><p><strong>1. Tujuan 
Layanan Koding Keliling</strong>:<br>&nbsp;</p><p>- Layanan ini bertujuan untuk 
membantu pengembang perangkat lunak dalam mengatasi masalah, mengoptimalkan kode
, dan memberikan solusi langsung di tempat.<br>- Pengembang dapat bertanya tenta
ng sintaks, algoritma, debugging, dan pemecahan masalah secara langsung kepada p
ara ahli.<br>&nbsp;</p><p><strong>2. Prosedur Layanan</strong>:</p><p><br>Mobil 
atau tim khusus yang dilengkapi dengan fasilitas komputer dan internet akan berk
eliling ke lokasi-lokasi tertentu.<br>Pengembang dapat mengunjungi mobil atau ti
m tersebut untuk berdiskusi, bertanya, dan memperoleh bantuan dalam mengatasi ma
salah koding.</p><p><br><strong>3. Keuntungan Layanan Koding Keliling</strong>:<
/p><p><br>- <strong>Kemudahan Akses</strong>: Pengembang tidak perlu datang ke k
antor atau lokasi tertentu untuk mendapatkan bantuan teknis.<br>- <strong>Intera
ksi Langsung</strong>: Pengembang dapat berinteraksi langsung dengan para ahli d
an memperoleh solusi secara real-time.</p>",
            "l_slug" => "layanan-coding-keliling",
            "created_at" => "2024-05-12 16:49:26",
            "updated_at" => "2024-05-12 16:49:26",
        ]);

        DB::table("layanan_payment_methods")->insert([
            "layanan_id" => 1,
            "is_dp" => 0,
            "tarif_dp" => 300000,
            "created_at" => "2024-05-12 10:51:52",
            "updated_at" => "2024-05-12 10:51:52",
        ]);

        /**
         * _____________________________________________________________________________
         * |                                                                            |
         * |                                Alat Barang                                 |
         * |                                                                            |
         * |****************************************************************************|
         * |
         * |
         * |
         */
        DB::table("satuan_alat_barangs")->insert([
            "id" => 1,
            "sab_nama" => "pack",
            "created_at" => "2024-05-12 18:28:08",
            "updated_at" => "2024-05-12 18:28:08",
        ]);

        DB::table("alat_barangs")->insert([
            "id" => 1,
            "satuan_alat_barang_id" => 1,
            "ab_nama" => "Papan coding",
            "ab_foto" => "alatBarang/GzuzACqIwKbuOQmO03h7PfbflsppioRwYf7TvYq6.png",
            "ab_keterangan" => "<p><strong>Arduino Uno R3</strong> adalah board mikrokon
troler berbasis IC ATmega328P. Board ini merupakan pilihan terbaik untuk memulai
 belajar elektronik beserta coding. Jika ini adalah pengalaman pertama Anda bere
ksperimen dengan Arduino, Uno sangat cocok. Berikut adalah beberapa spesifikasi 
Arduino Uno R3:</p><p>&nbsp;</p><p>- <strong>Input/Output Digital</strong>: Terd
apat 14 pin input/output digital, di mana 6 di antaranya dapat digunakan sebagai
 output PWM.<br>- <strong>Input Analog</strong>: Terdapat 6 input analog.<br>- <
strong>Kristal Kuarsa</strong>: Memiliki kristal kuarsa 16 MHz.<br>- <strong>Kon
eksi USB</strong>: Dilengkapi dengan konektor USB.<br>- <strong>Colokan Listrik<
/strong>: Memiliki colokan listrik.<br>- <strong>Header ICSP</strong>: Terdapat 
header ICSP.<br>- <strong>Tombol Reset</strong>: Dilengkapi dengan tombol reset.
<br>&nbsp;</p><p>Arduino Uno R3 adalah board yang paling banyak digunakan dan di
dokumentasikan dari seluruh keluarga Arduino. Anda dapat mengutak-atik Uno Anda 
tanpa terlalu banyak mengkhawatirkan melakukan kesalahan. Jika terjadi skenario 
terburuk, Anda dapat mengganti chip dengan biaya yang terjangkau dan mulai ekspe
rimen dari awal lagi11.</p>",
            "ab_tarif" => "50000",
            "ab_qty" => 40,
            "ab_status" => "tersedia",
            "ab_slug" => "papan-coding",
            "created_at" => "2024-05-12 18:31:58",
            "updated_at" => "2024-05-12 18:31:58",
        ]);

        DB::table("alat_barang_payment_methods")->insert([
            "alat_barang_id" => 1,
            "is_dp" => 0,
            "tarif_dp" => 300000,
            "created_at" => "2024-05-12 10:51:52",
            "updated_at" => "2024-05-12 10:51:52",
        ]);
    }
}
