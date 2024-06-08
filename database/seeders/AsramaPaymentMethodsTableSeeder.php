<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AsramaPaymentMethodsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('asrama_payment_methods')->delete();
        
        \DB::table('asrama_payment_methods')->insert(array (
            0 => 
            array (
                'tipe_asrama_id' => 1,
                'is_dp' => 0,
                'tarif_dp' => 300000,
                'created_at' => '2024-05-15 23:43:51',
                'updated_at' => '2024-06-08 09:08:06',
            ),
            1 => 
            array (
                'tipe_asrama_id' => 2,
                'is_dp' => 0,
                'tarif_dp' => 0,
                'created_at' => '2024-05-16 03:51:24',
                'updated_at' => '2024-05-16 03:51:24',
            ),
        ));
        
        
    }
}