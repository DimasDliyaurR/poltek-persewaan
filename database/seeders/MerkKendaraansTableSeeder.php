<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MerkKendaraansTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('merk_kendaraans')->delete();
        
        \DB::table('merk_kendaraans')->insert(array (
            0 => 
            array (
                'id' => 1,
                'mk_foto' => 'merkKendaraan/4WWajVyt2eLKCdCY0cnNtJFrdlW5VSR6TPUssk2M.jpg',
                'mk_merk' => 'Bus Panjang',
                'mk_seri' => '127167',
                'mk_tarif' => '300000',
                'mk_kapasitas' => '28',
                'mk_deskripsi' => '<p><strong>Bus mini</strong> adalah moda transportasi umum yang sering digunakan untuk mengangkut penumpang dalam jumlah yang terbatas. Meskipun ukurannya lebih kecil daripada bus konvensional, b us mini tetap nyaman dan praktis digunakan. Berikut beberapa informasi mengenai bus mini:</p><p>&nbsp;</p><p><strong>1. Kapasitas Standar Bus Mini</strong>:<br>- Secara umum, bus mini dapat menampung sekitar 15 hingga 30 penumpang.<br>- Jumlah ini lebih sedikit dibandingkan dengan bus konvensional yang mampu mengangkut puluha n hingga ratusan penumpang.<br>&nbsp;</p><p><strong>2. Ukuran dan Konfigurasi Tempat Duduk</strong>:</p><p><b r=""><strong>- Bus mini memiliki ukuran lebih kecil dan lebih lincah di jalanan yang sempit.</strong></b><br><b r=""><strong>- Beberapa bus mini dile ngkapi dengan fasilitas seperti AC, televisi, dan kursi yang empuk.</strong></b><br><b r=""><strong>&nbsp;</strong></b></p><p><b r=""><strong>3. Tipe Bus Mini&lt; /strong&gt;:</strong></b></p><p><br><b r=""><strong>- Terdapat beberapa tipe bus mini, antara lain:</strong></b><br><b r=""><strong>- MiniBus 9-Seater: Dengan kapasitas 9 penumpang.</strong></b><br><b r=""><strong>- MiniBus 16-Seater: Dengan kapasitas 16 penumpang.</strong></b><br><b r=""><strong>- Microbus: Dengan kapasitas yang berva riasi1122.</strong></b><br><b r=""><strong>&nbsp;</strong></b></p><p><b r=""><strong>4. Kelebihan Bus Mini:</strong></b><br><b r=""><strong>Praktis: Cocok untuk perjalanan bersama keluarga kecil atau kelompok teman yang tidak terlalu banyak.</strong></b><br><b r=""><strong>Efisien: Lebih lincah di jalanan sempit dan menghindari kemacetan.</strong></b><br><b r=""><strong>Nyaman: Meskipun kapasitas terbatas, tetap memberikan pengalaman perjalanan yang n yaman.</strong></b></p>',
                'mk_bahan_bakar' => 'Bensin',
                'mk_slug' => 'bus-panjang',
                'created_at' => '2024-05-11 21:25:00',
                'updated_at' => '2024-05-16 09:43:00',
            ),
            1 => 
            array (
                'id' => 2,
                'mk_foto' => 'file/w52IjgN4mhshNHvpQTiDzFLGMlAEK1aadw9hAjyO.jpg',
                'mk_merk' => 'Haice',
                'mk_seri' => 'Haice 123',
                'mk_tarif' => '200000',
                'mk_kapasitas' => '7',
                'mk_deskripsi' => '<p><strong>Toyota Hiace</strong> adalah minivan yang hadir dalam dua varian. Varian tertinggi dilengkapi dengan mesin diesel berkapasitas 2755 cc, mampu menghasilkan tenaga hingga 174 hp dan torsi puncak 420 Nm. Hiace Premio berkapasitas 16 penumpang dan dilengkapi dengan transmisi 6-speed manual. Sistem keamanannya dilengkapi dengan Power Door Locks11.</p><p>&nbsp;</p><p>Selain itu, Toyota HiAce 2024 tersedia dalam transmisi manual dan merupakan minivan komersial dengan 16 tempat duduk dan berat 2145 kg. Dimensinya adalah sebagai berikut:</p><p>&nbsp;</p><p>1. Panjang: 5380 mm<br>2. Lebar: 1880 mm<br>3. Tinggi: 2285 mm<br>4. Wheelbase: 3110 mm<br>5. Ground clearance: 179 mm22.</p><p><br>Jadi, Toyota Hiace adalah minivan yang cocok untuk mengangkut penumpang dengan kapasitas yang luas dan dilengkapi dengan fitur keamanan yang memada</p>',
                'mk_bahan_bakar' => 'Bensin',
                'mk_slug' => 'haice',
                'created_at' => '2024-05-16 04:23:39',
                'updated_at' => '2024-05-16 04:23:39',
            ),
            2 => 
            array (
                'id' => 3,
                'mk_foto' => 'file/tmH4UY8ZTSULKIGOTN0hifPUPrm6Jobr0waw2jrY.jpg',
                'mk_merk' => 'Truk',
                'mk_seri' => 'Truk 345',
                'mk_tarif' => '300000',
                'mk_kapasitas' => '2',
            'mk_deskripsi' => '<p><strong>Truk adalah</strong> sebuah kendaraan beroda empat atau lebih yang digunakan untuk mengangkut barang. Dalam bentuk yang lebih kecil, mobil barang disebut sebagai “losbak”. Truk memiliki berbagai jenis dan konfigurasi, tergantung pada keperluan pengangkutan. Berikut beberapa jenis truk yang umum digunakan:</p><p>&nbsp;</p><p>1. <strong>Truk Engkel</strong>:</p><p><br>- Truk dengan satu sumbu di bagian belakang.<br>- Biasanya digunakan untuk mengangkut barang dalam jumlah sedang.<br>&nbsp;</p><p><strong>2. Truk Tronton</strong>:<br>- Truk dengan tiga sumbu (dua di belakang dan satu di depan).<br>- Kapasitas angkut lebih besar daripada truk engkel.<br>&nbsp;</p><p><strong>3. Truk Trailer</strong>:<br>- Truk dengan dua bagian terpisah: truk penggerak (prime mover) dan truk gandeng (trailer).<br>- Kapasitas angkut sangat besar dan digunakan untuk mengangkut kontainer, barang berat, atau bahan cair.<br>&nbsp;</p><p><strong>4. Truk Tangki</strong>:<br>- Truk khusus untuk mengangkut cairan seperti bahan bakar minyak, susu, atau bahan kimia.<br>&nbsp;</p><p>Seiring dengan perkembangan infrastruktur jalan, penggunaan truk sebagai angkutan barang semakin meningkat, baik dalam skala lokal maupun internasiona</p>',
                'mk_bahan_bakar' => 'Solar',
                'mk_slug' => 'truk',
                'created_at' => '2024-05-16 04:25:49',
                'updated_at' => '2024-05-16 04:25:49',
            ),
        ));
        
        
    }
}