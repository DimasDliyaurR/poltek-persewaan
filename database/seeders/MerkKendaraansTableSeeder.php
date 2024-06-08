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
                'mk_foto' => 'file/GsS7gclGjGLAwtPNX5IakUhVv2IMIkpCatXxViZE.jpg',
                'mk_merk' => 'Bus Mini',
                'mk_seri' => 'Mini Bus',
                'mk_tarif' => '300000',
                'mk_kapasitas' => '28',
                'mk_deskripsi' => '<p>Mancappp</p>',
                'mk_bahan_bakar' => 'Solar',
                'mk_slug' => 'bus-mini',
                'created_at' => '2024-06-07 20:49:34',
                'updated_at' => '2024-06-07 20:49:34',
            ),
            1 => 
            array (
                'id' => 2,
                'mk_foto' => 'file/444mEv147nADEVTMAeRf1jznmoCT7DTM0689buWZ.jpg',
                'mk_merk' => 'Haice',
                'mk_seri' => 'Haice 123',
                'mk_tarif' => '150000',
                'mk_kapasitas' => '28',
                'mk_deskripsi' => '<p>Mancapp</p>',
                'mk_bahan_bakar' => 'Bensin',
                'mk_slug' => 'haice',
                'created_at' => '2024-06-07 21:01:06',
                'updated_at' => '2024-06-07 21:01:06',
            ),
        ));
        
        
    }
}