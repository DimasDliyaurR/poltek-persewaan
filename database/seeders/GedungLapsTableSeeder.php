<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class GedungLapsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('gedung_laps')->delete();
        
        \DB::table('gedung_laps')->insert(array (
            0 => 
            array (
                'id' => 1,
                'gl_foto' => 'gedungLap/MmGDqKtrAcr0ELCLMSjvyQgYE5ZYkZKiY9ILn2kl.jpg',
                'gl_nama' => 'Lapangan Futsal',
            'gl_keterangan' => '<p><strong>Lapangan futsal </strong>adalah tempat di mana permainan futsal, bentuk sepak bola dalam ruangan, dimainkan. Ukuran lapangan futsal telah diatur oleh Federasi Internationale de Football Association (FIFA). Berikut adalah ukuran standar lapangan futsal:</p><p>&nbsp;</p><p><strong>1. Ukuran Lapangan Futsal Non-Internasional</strong>:</p><p><br>- Panjang lapangan: 25 hingga 42 meter.<br>- Lebar lapangan: 16 hingga 25 meter.<br>&nbsp;</p><p><strong>2. Ukuran Lapangan Futsal Internasional</strong>:</p><p><br>- Panjang lapangan: 38 hingga 42 meter.<br>- Lebar lapangan: 20 hingga 25 meter.<br>&nbsp;</p><p><strong>3. Ukuran Tiang Gawang dan Lainnya</strong>:</p><p><br>- Tinggi gawang: 2 meter.<br>- Lebar gawang: 3 meter.<br>- Titik tengah pada garis tengah lapangan dan lingkaran pada titik tengah berjarak 3 meter.<br>- Seperempat lingkaran dengan radius 6 meter ditarik sebagai pusat di luar dari masing-masing tiang gawang.<br>- Garis penghubung di atas garis seperempat lingkaran memiliki panjang 3,16 meter sejajar dengan garis gawang.<br>- Titik penalti dari tengah garis gawang digambarkan 6 meter.<br>- Titik penalti kedua dari titik tengah garis gawang berjarak 10 meter.<br>- Seperempat lingkaran sudut lapangan berjarak 25 cm.<br>- Zona pergantian pemain dengan panjang 5 meter terletak di depan tempat duduk pemain cadangan.</p>',
                'gl_tarif' => '30000',
                'gl_satuan_gedung' => 'jam',
                'gl_kapasitas_gedung' => 45,
                'gl_ukuran_gedung' => '45x67 m',
                'gl_slug' => 'lapangan-futsal',
                'created_at' => '2024-05-12 10:51:52',
                'updated_at' => '2024-05-16 03:38:50',
            ),
        ));
        
        
    }
}