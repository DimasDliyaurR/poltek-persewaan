<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class JadwalGedungsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('jadwal_gedungs')->delete();
        
        \DB::table('jadwal_gedungs')->insert(array (
            0 => 
            array (
                'id' => 2,
                'jg_mulai' => '00:00:00',
                'jg_akhir' => '01:00:00',
                'created_at' => '2024-06-08 11:58:26',
                'updated_at' => '2024-06-08 11:58:26',
            ),
            1 => 
            array (
                'id' => 3,
                'jg_mulai' => '11:58:00',
                'jg_akhir' => '12:00:00',
                'created_at' => '2024-06-08 11:58:47',
                'updated_at' => '2024-06-08 11:58:47',
            ),
        ));
        
        
    }
}