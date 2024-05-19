<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class LayanansTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('layanans')->delete();
        
        \DB::table('layanans')->insert(array (
            0 => 
            array (
                'id' => 1,
                'l_foto' => 'file/qiD0h4XIJFmqFzELVyZt6UQooEsfKB912yYgZjR8.jpg',
                'l_nama' => 'Marching Band',
                'l_tarif' => 32000000,
                'l_personil' => 0,
                'l_satuan' => 'jam',
                'l_status' => 'tersedia',
                'l_deskripsi' => '<p><strong>Layanan koding keliling</strong> adalah inisiat if yang memudahkan para pengembang perangkat lunak untuk mengakses layanan pemro graman dan bantuan teknis secara langsung di lokasi tertentu. Berikut beberapa i nformasi mengenai layanan koding keliling:</p><p>&nbsp;</p><p><strong>1. Tujuan Layanan Koding Keliling</strong>:<br>&nbsp;</p><p>- Layanan ini bertujuan untuk membantu pengembang perangkat lunak dalam mengatasi masalah, mengoptimalkan kode , dan memberikan solusi langsung di tempat.<br>- Pengembang dapat bertanya tenta ng sintaks, algoritma, debugging, dan pemecahan masalah secara langsung kepada p ara ahli.<br>&nbsp;</p><p><strong>2. Prosedur Layanan</strong>:</p><p><br>Mobil atau tim khusus yang dilengkapi dengan fasilitas komputer dan internet akan berk eliling ke lokasi-lokasi tertentu.<br>Pengembang dapat mengunjungi mobil atau ti m tersebut untuk berdiskusi, bertanya, dan memperoleh bantuan dalam mengatasi ma salah koding.</p><p><br><strong>3. Keuntungan Layanan Koding Keliling</strong>:&lt; /p&gt;</p><p><br>- <strong>Kemudahan Akses</strong>: Pengembang tidak perlu datang ke k antor atau lokasi tertentu untuk mendapatkan bantuan teknis.<br>- <strong>Intera ksi Langsung</strong>: Pengembang dapat berinteraksi langsung dengan para ahli d an memperoleh solusi secara real-time.</p>',
                'l_slug' => 'marching-band',
                'created_at' => '2024-05-12 16:49:26',
                'updated_at' => '2024-05-16 09:07:27',
            ),
            1 => 
            array (
                'id' => 2,
                'l_foto' => 'layanan/w8nlt0xO8oxDzN3zlXFYdQsKx74lIndy0KI74JKk.png',
                'l_nama' => 'Pendang Pora',
                'l_tarif' => 7000000,
                'l_personil' => 0,
                'l_satuan' => 'kegiatan',
                'l_status' => 'tersedia',
            'l_deskripsi' => '<p>Upacara Pedang Pora adalah tradisi militer turun-temurun yang ada di Indonesia. Tradisi ini dilaksanakan saat perayaan pernikahan prajurit militer. Istilah “pedang pora” berasal dari kata “pedang pura” atau “gapura pedang”. Prajurit militer yang melepas masa lajangnya dengan menikah akan beriringan dengan hunusan pedang yang membentuk sebuah gapura oleh rekan-rekan atau adik angkatan. Sepasang pengantin akan melewati gapura tersebut untuk berjalan bersama menuju pelaminan. Pelaksanaan upacara ini memiliki makna penting sebagai simbol solidaritas dan persaudaraan antar prajurit militer. Upacara pedang pora juga menandai penerimaan pasangan sang prajurit dalam keluarga besar militer, karena nantinya pasangan tersebut akan tergabung dalam Persit (Persatuan Istri Tentara). Upacara pedang pora hanya dapat berlangsung sekali sepanjang rangkaian prosesi pernikahan. Dokumen persyaratan yang perlu disiapkan sebelum pelaksanaan resepsi dengan tradisi pedang pora antara lain permohonan izin untuk menikah, surat pernyataan kesanggupan calon mempelai wanita, surat pernyataan persetujuan dari pihak orang tua atau wali calon istri, dan surat keterangan belum menikah</p>',
                'l_slug' => 'pendang-pora',
                'created_at' => '2024-05-16 07:29:40',
                'updated_at' => '2024-05-16 07:29:40',
            ),
        ));
        
        
    }
}