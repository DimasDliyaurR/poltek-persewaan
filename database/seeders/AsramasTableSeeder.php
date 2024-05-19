<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AsramasTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('asramas')->delete();
        
        \DB::table('asramas')->insert(array (
            0 => 
            array (
                'id' => 1,
                'tipe_asrama_id' => 1,
                'a_nama_ruangan' => 'Ruangan 403 Esxtra Single Avenged Bad',
                'a_slug' => 'ruangan-403-esxtra-single-avenged-bad',
                'a_status' => 'tersedia',
                'created_at' => '2024-05-15 23:43:51',
                'updated_at' => '2024-05-15 23:43:51',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'tipe_asrama_id' => 1,
                'a_nama_ruangan' => 'Ruangan 403 doeble bad',
                'a_slug' => 'ruangan-403-doeble-bad',
                'a_status' => 'tersedia',
                'created_at' => '2024-05-15 23:43:51',
                'updated_at' => '2024-05-16 09:45:49',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'tipe_asrama_id' => 2,
                'a_nama_ruangan' => 'Ruangan 203',
                'a_slug' => 'ruangan-203',
                'a_status' => 'tersedia',
                'created_at' => '2024-05-16 03:52:29',
                'updated_at' => '2024-05-16 03:52:29',
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'tipe_asrama_id' => 2,
                'a_nama_ruangan' => 'Ruangan 204',
                'a_slug' => 'ruangan-204',
                'a_status' => 'tersedia',
                'created_at' => '2024-05-16 03:52:38',
                'updated_at' => '2024-05-16 03:52:38',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}