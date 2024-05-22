<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class FasilitasAsramasTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('fasilitas_asramas')->delete();
        
        \DB::table('fasilitas_asramas')->insert(array (
            0 => 
            array (
                'id' => 1,
                'fa_icon' => 'bath',
                'fa_nama' => 'Bak Mandi',
                'fa_tarif' => 20000,
                'fa_status' => 'tersedia',
                'created_at' => '2024-05-15 23:43:51',
                'updated_at' => '2024-05-15 23:43:51',
            ),
            1 => 
            array (
                'id' => 2,
                'fa_icon' => 'shower',
                'fa_nama' => 'shower',
                'fa_tarif' => 20000,
                'fa_status' => 'tersedia',
                'created_at' => '2024-05-15 23:43:51',
                'updated_at' => '2024-05-15 23:43:51',
            ),
            2 => 
            array (
                'id' => 3,
                'fa_icon' => 'food',
                'fa_nama' => 'Sarpan',
                'fa_tarif' => 20000,
                'fa_status' => 'tersedia',
                'created_at' => '2024-05-16 09:13:53',
                'updated_at' => '2024-05-16 09:13:53',
            ),
        ));
        
        
    }
}