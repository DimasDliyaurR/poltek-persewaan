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
                'is_dp' => 1,
                'tarif_dp' => 300000,
                'created_at' => '2024-05-15 23:43:52',
                'updated_at' => '2024-05-15 23:43:52',
            ),
            1 => 
            array (
                'merk_kendaraan_id' => 2,
                'is_dp' => 0,
                'tarif_dp' => 0,
                'created_at' => '2024-05-16 04:23:39',
                'updated_at' => '2024-05-16 04:23:39',
            ),
            2 => 
            array (
                'merk_kendaraan_id' => 3,
                'is_dp' => 0,
                'tarif_dp' => 0,
                'created_at' => '2024-05-16 04:25:49',
                'updated_at' => '2024-05-16 04:25:49',
            ),
        ));
        
        
    }
}