<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DetailFotoTipeAsramasTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('detail_foto_tipe_asramas')->delete();
        
        \DB::table('detail_foto_tipe_asramas')->insert(array (
            0 => 
            array (
                'id' => 2,
                'tipe_asrama_id' => 1,
                'dfta_foto' => 'detail_foto_tipe_asrama/vCcSvrnd61jzeqaIIQOscOv4rmWOihSj0ZJBeWbS.jpg',
                'created_at' => '2024-05-15 23:55:55',
                'updated_at' => '2024-05-15 23:55:55',
            ),
            1 => 
            array (
                'id' => 3,
                'tipe_asrama_id' => 1,
                'dfta_foto' => 'detail_foto_tipe_asrama/clMk9dHNZJv85GyHMADOnkx3UpHvQ3VEEnH9q6SB.jpg',
                'created_at' => '2024-05-15 23:56:05',
                'updated_at' => '2024-05-15 23:56:05',
            ),
            2 => 
            array (
                'id' => 4,
                'tipe_asrama_id' => 1,
                'dfta_foto' => 'detail_foto_tipe_asrama/S7UKhqMIfFiv1WcRTXcSNcR45xv2VrUNOSuV8FAs.jpg',
                'created_at' => '2024-05-15 23:56:14',
                'updated_at' => '2024-05-15 23:56:14',
            ),
            3 => 
            array (
                'id' => 5,
                'tipe_asrama_id' => 2,
                'dfta_foto' => 'detail_foto_tipe_asrama/tQiKQn76NblesX9SiMH2xZRyJX1x0khDWLiyp9oP.jpg',
                'created_at' => '2024-05-16 03:51:45',
                'updated_at' => '2024-05-16 03:51:45',
            ),
            4 => 
            array (
                'id' => 6,
                'tipe_asrama_id' => 2,
                'dfta_foto' => 'detail_foto_tipe_asrama/4EHn84NdeeRAVpfUtPMoQaBtABaeesuFWyjnzhsR.jpg',
                'created_at' => '2024-05-16 03:52:05',
                'updated_at' => '2024-05-16 03:52:05',
            ),
        ));
        
        
    }
}