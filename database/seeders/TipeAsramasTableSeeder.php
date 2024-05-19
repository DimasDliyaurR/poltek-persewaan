<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TipeAsramasTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('tipe_asramas')->delete();
        
        \DB::table('tipe_asramas')->insert(array (
            0 => 
            array (
                'id' => 1,
                'ta_foto' => 'asrama/QVcP3EM7gI2F65TEjinrMcCeQmpl9VgSCWiy9urN.jpg',
                'ta_nama' => 'Tipe Deluxe with swift room',
                'ta_tarif' => 700000,
                'ta_kapasitas' => 2,
                'ta_deskripsi' => '<p><strong>Tipe Deluxe Room</strong> adalah salah satu jenis ruangan yang biasanya ditawarkan oleh pengi napan, terutama hotel, saat Anda sedang berlibur. Istilah ini lebih sering ditemui di hotel sebagai pembeda dengan tipe kamar l ainnya. Berikut beberapa informasi mengenai Deluxe Room:</p><p>&nbsp;</p><p><strong>1. Pengertian Deluxe Room</strong>:<br>&amp;nbs p;</p><p>- Deluxe Room adalah tipe kamar hotel yang bisa dipilih saat menginap.<br>- Kamar ini memiliki fasilitas yang lebih un ggul dibandingkan ruangan standard.<br>- <strong>Ukuran ruangan Deluxe Room lebih besar </strong>daripada ruangan standar, sehi ngga cocok untuk yang sudah berkeluarga atau ingin lebih memanjakan diri saat liburan.<br>- <strong>Fasilitas </strong>di kamar Deluxe Room juga lebih lengkap, seperti <strong>akses khusus ke fasilitas olahraga, kolam renang, dan sebagainya</strong>.<br>&nbsp;</p><p><strong>2. Perbedaan dengan Standard Room:</strong></p><p><br>- <strong>Standard Room </strong>menawarkan fasilita s dan pelayanan yang lebih mendasar daripada Deluxe Room.<br>- Ukuran kamar Standard Room lebih kecil dan fasilitasnya lebih se derhana.<br>- Tarif Standard Room juga lebih terjangkau dibanding Deluxe Room, cocok bagi yang ingin berlibur dengan budget ter batas.</p>',
                'ta_slug' => 'tipe-deluxe-with-swift-room',
                'created_at' => '2024-05-15 23:43:51',
                'updated_at' => '2024-05-15 23:55:26',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'ta_foto' => 'asrama/v5QV6QP7KJFF5NHunGVFRBwuar0zCzJXu3sK46FF.jpg',
                'ta_nama' => 'Tipe Barak',
                'ta_tarif' => 125000,
                'ta_kapasitas' => 16,
                'ta_deskripsi' => '<p>Tipe Barak merupakan tipe yang memiliki kapasitas orang mencapai 16 orang per kamar.</p><p>&nbsp;</p><p>Kelebihan Tipe Barak :</p><p>- Memiliki banyak kasur , Sehingga akan cocok untuk Anda yang sedang berlibur bersama keluarga besar</p>',
                'ta_slug' => 'tipe-barak',
                'created_at' => '2024-05-16 03:51:24',
                'updated_at' => '2024-05-16 03:51:24',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}