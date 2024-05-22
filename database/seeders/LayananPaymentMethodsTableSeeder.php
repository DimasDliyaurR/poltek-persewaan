<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class LayananPaymentMethodsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('layanan_payment_methods')->delete();
        
        \DB::table('layanan_payment_methods')->insert(array (
            0 => 
            array (
                'layanan_id' => 1,
                'is_dp' => 0,
                'tarif_dp' => 300000,
                'created_at' => '2024-05-12 10:51:52',
                'updated_at' => '2024-05-12 10:51:52',
            ),
            1 => 
            array (
                'layanan_id' => 2,
                'is_dp' => 0,
                'tarif_dp' => 3500000,
                'created_at' => '2024-05-16 07:29:40',
                'updated_at' => '2024-05-16 07:29:40',
            ),
        ));
        
        
    }
}