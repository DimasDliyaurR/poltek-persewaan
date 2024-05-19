<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AlatBarangPaymentMethodsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('alat_barang_payment_methods')->delete();
        
        \DB::table('alat_barang_payment_methods')->insert(array (
            0 => 
            array (
                'alat_barang_id' => 1,
                'is_dp' => 0,
                'tarif_dp' => 300000,
                'created_at' => '2024-05-12 10:51:52',
                'updated_at' => '2024-05-12 10:51:52',
            ),
        ));
        
        
    }
}