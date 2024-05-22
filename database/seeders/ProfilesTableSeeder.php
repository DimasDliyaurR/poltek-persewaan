<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProfilesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('profiles')->delete();
        
        \DB::table('profiles')->insert(array (
            0 => 
            array (
                'id' => 1,
                'user_id' => 1,
                'slug' => 'dimas12',
                'nama_lengkap' => 'Dimas Dliyaur Rahma',
                'foto_ktp' => 'ktp/ZowdST4OCSWy4W5uPmXlUMrsFzL5LYkvz7Hu973R.png',
                'alamat' => 'Jl. Raya Telang, Perumahan Telang Inda, Telang, Kec. Kamal, Kabupaten Bangkalan, Jawa Timur 69162',
                'no_telp' => '083854691092',
                'created_at' => '2024-05-19 17:49:22',
                'updated_at' => '2024-05-19 17:49:22',
            ),
        ));
        
        
    }
}