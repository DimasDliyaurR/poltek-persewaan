<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'username' => 'dimas12',
                'email' => 'dimas@gmail.com',
                'email_verified_at' => NULL,
                'level' => 'admin',
                'password' => '$2y$12$D2UEEYSd2YjOAHdUTlmSZuNxVNduMzg2Z6zEvLa2cX9cy98pi6Pv6',
                'remember_token' => NULL,
                'created_at' => '2024-05-19 17:49:22',
                'updated_at' => '2024-05-19 17:49:22',
            ),
        ));
        
        
    }
}