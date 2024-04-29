<?php

namespace Database\Seeders;

use App\Models\TransaksiAsrama;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AsramaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $days = [[1,3], 5, 6, 9, [12, 13]];
        $fake =fake('id');
        $today = date('Y-m-d');
        foreach($days as $day) {
            if(is_array($day)){
            $events[] =
            [
                'title' => $fake->sentence(3),
                'ta_check_in' =>    date('Y-m-d', strtotime($today. ' + '.$day[0].' days')),
                'ta_check_out' =>    date('Y-m-d', strtotime($today. ' + '.$day[1].' days')),
                'created_at' => now(),
                'updated_at' => now()
            ];
            } else{
                $events[] =
            [
                'title' => $fake->sentence(3),
                'ta_check_in' =>date('Y-m-d', strtotime($today. ' + '.$day.' days')),
                'ta_check_out' =>date('Y-m-d', strtotime($today. ' + '.$day.' days')),
                'created_at' => now(),
                'updated_at' => now()
            ];
            }
            
        }
        TransaksiAsrama::insert($events);
    }
}
