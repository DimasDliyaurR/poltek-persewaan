<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class KendaraansTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('kendaraans')->delete();
        
        \DB::table('kendaraans')->insert(array (
            0 => 
            array (
                'id' => 1,
                'merk_kendaraan_id' => 1,
                'k_plat' => 'L 87897 GF',
                'k_urutan_prioritas' => 1,
                'k_status' => 'tersedia',
                'k_slug' => 'l-87897-gf',
                'created_at' => '2024-06-07 21:01:17',
                'updated_at' => '2024-06-07 21:01:17',
            ),
            1 => 
            array (
                'id' => 2,
                'merk_kendaraan_id' => 1,
                'k_plat' => 'L 37827 JHN',
                'k_urutan_prioritas' => 2,
                'k_status' => 'tersedia',
                'k_slug' => 'l-37827-jhn',
                'created_at' => '2024-06-07 21:01:25',
                'updated_at' => '2024-06-07 21:01:25',
            ),
            2 => 
            array (
                'id' => 3,
                'merk_kendaraan_id' => 2,
                'k_plat' => 'L 37827 GHM',
                'k_urutan_prioritas' => 1,
                'k_status' => 'tersedia',
                'k_slug' => 'l-37827-ghm',
                'created_at' => '2024-06-07 21:01:34',
                'updated_at' => '2024-06-07 21:01:34',
            ),
            3 => 
            array (
                'id' => 4,
                'merk_kendaraan_id' => 2,
                'k_plat' => 'L 6567 GB',
                'k_urutan_prioritas' => 2,
                'k_status' => 'tersedia',
                'k_slug' => 'l-6567-gb',
                'created_at' => '2024-06-07 21:01:43',
                'updated_at' => '2024-06-07 21:01:43',
            ),
        ));
        
        
    }
}