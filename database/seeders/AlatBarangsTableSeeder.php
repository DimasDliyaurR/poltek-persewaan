<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AlatBarangsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('alat_barangs')->delete();
        
        \DB::table('alat_barangs')->insert(array (
            0 => 
            array (
                'id' => 1,
                'satuan_alat_barang_id' => 1,
                'ab_nama' => 'Papan coding',
                'ab_foto' => 'alatBarang/rCj5T4QtBBArgh15B876JVORjwo94auWVkDiH2Cz.webp',
                'ab_keterangan' => '<p><strong>Arduino Uno R3</strong> adalah board mikrokon troler berbasis IC ATmega328P. Board ini merupakan pilihan terbaik untuk memulai belajar elektronik beserta coding. Jika ini adalah pengalaman pertama Anda bere ksperimen dengan Arduino, Uno sangat cocok. Berikut adalah beberapa spesifikasi Arduino Uno R3:</p><p>&nbsp;</p><p>- <strong>Input/Output Digital</strong>: Terd apat 14 pin input/output digital, di mana 6 di antaranya dapat digunakan sebagai output PWM.<br>- <strong>Input Analog</strong>: Terdapat 6 input analog.<br>- &lt; strong&gt;Kristal Kuarsa: Memiliki kristal kuarsa 16 MHz.<br>- <strong>Kon eksi USB</strong>: Dilengkapi dengan konektor USB.<br>- <strong>Colokan Listrik&lt; /strong&gt;: Memiliki colokan listrik.</strong><br><strong>- Header ICSP: Terdapat header ICSP.</strong><br><strong>- Tombol Reset: Dilengkapi dengan tombol reset.&nbsp;</strong><br><strong>&nbsp;</strong></p><p><strong>Arduino Uno R3 adalah board yang paling banyak digunakan dan di dokumentasikan dari seluruh keluarga Arduino. Anda dapat mengutak-atik Uno Anda tanpa terlalu banyak mengkhawatirkan melakukan kesalahan. Jika terjadi skenario terburuk, Anda dapat mengganti chip dengan biaya yang terjangkau dan mulai ekspe rimen dari awal lagi11.</strong></p>',
                'ab_tarif' => '50000',
                'ab_qty' => -1,
                'ab_status' => 'tersedia',
                'ab_slug' => 'papan-coding',
                'created_at' => '2024-05-12 18:31:58',
                'updated_at' => '2024-05-16 07:22:39',
            ),
        ));
        
        
    }
}