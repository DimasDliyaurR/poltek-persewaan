<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class KendaraansTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('kendaraans')->delete();

        \DB::table('kendaraans')->insert(array(
            0 =>
            array(
                'id' => 1,
                'merk_kendaraan_id' => 1,
                'k_plat' => 'L 37827 GH',
                'k_status' => 'tersedia',
                'k_slug' => 'l-37827-gh',
                'created_at' => '2024-05-11 21:32:18',
                'updated_at' => '2024-05-11 21:32:18',
            ),
            1 =>
            array(
                'id' => 2,
                'merk_kendaraan_id' => 1,
                'k_plat' => 'L 87897 GF',
                'k_status' => 'tersedia',
                'k_slug' => 'l-87897-gf',
                'created_at' => '2024-05-11 21:32:30',
                'updated_at' => '2024-05-11 21:32:30',
            ),
        ));
    }
}
