<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DetailFasilitasAsramasTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('detail_fasilitas_asramas')->delete();
        
        \DB::table('detail_fasilitas_asramas')->insert(array (
            0 => 
            array (
                'id' => 1,
                'tipe_asrama_id' => 1,
                'fasilitas_asrama_id' => 1,
                'dfa_status' => 'include',
                'created_at' => '2024-05-15 23:43:52',
                'updated_at' => '2024-05-15 23:43:52',
            ),
            1 => 
            array (
                'id' => 2,
                'tipe_asrama_id' => 1,
                'fasilitas_asrama_id' => 2,
                'dfa_status' => 'pilihan',
                'created_at' => '2024-05-15 23:43:52',
                'updated_at' => '2024-05-15 23:43:52',
            ),
            2 => 
            array (
                'id' => 3,
                'tipe_asrama_id' => 1,
                'fasilitas_asrama_id' => 3,
                'dfa_status' => 'pilihan',
                'created_at' => '2024-05-16 09:14:24',
                'updated_at' => '2024-05-16 09:14:24',
            ),
            3 => 
            array (
                'id' => 4,
                'tipe_asrama_id' => 2,
                'fasilitas_asrama_id' => 3,
                'dfa_status' => 'pilihan',
                'created_at' => '2024-05-16 09:14:36',
                'updated_at' => '2024-05-16 09:14:36',
            ),
            4 => 
            array (
                'id' => 5,
                'tipe_asrama_id' => 2,
                'fasilitas_asrama_id' => 2,
                'dfa_status' => 'pilihan',
                'created_at' => '2024-05-16 09:47:55',
                'updated_at' => '2024-05-16 09:47:55',
            ),
        ));
        
        
    }
}