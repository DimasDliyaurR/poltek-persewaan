<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SatuanAlatBarangsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('satuan_alat_barangs')->delete();
        
        \DB::table('satuan_alat_barangs')->insert(array (
            0 => 
            array (
                'id' => 1,
                'sab_nama' => 'pack',
                'created_at' => '2024-05-12 18:28:08',
                'updated_at' => '2024-05-12 18:28:08',
            ),
        ));
        
        
    }
}