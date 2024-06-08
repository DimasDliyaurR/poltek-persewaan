<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MerkKendaraanPaymentMethodsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('merk_kendaraan_payment_methods')->delete();
        
        \DB::table('merk_kendaraan_payment_methods')->insert(array (
            0 => 
            array (
                'merk_kendaraan_id' => 1,
                'is_dp' => 0,
                'tarif_dp' => 0,
                'created_at' => '2024-06-07 21:11:59',
                'updated_at' => '2024-06-07 21:11:59',
            ),
            1 => 
            array (
                'merk_kendaraan_id' => 2,
                'is_dp' => 0,
                'tarif_dp' => 0,
                'created_at' => '2024-06-07 21:12:59',
                'updated_at' => '2024-06-07 21:12:59',
            ),
        ));
        
        
    }
}