<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Event;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $days = [[1,3],5,6,9, [12,13]];
        $fake = fake('idID');
        $today = date('Y-m-d');
        foreach ($days as $day){
            if (is_array($day)) {
                $events[]=[
                    'title' => $fake->sentence(3),
                    'tgl_mulai' =>date('Y-m-d', strtotime($today. '+ '.$day[0].'days')),
                    'tgl_kembali'=>date('Y-m-d', strtotime($today. '+ '.$day[1].'days')),
                    'category'=> $fake->randomElement(['success', 'danger', 'warning', 'info']),
                    'created_at'=>now(),
                    'updated_at'=>now(),
                ];
            } else {
                $events[]=[
                    'title' => $fake->sentence(3),
                    'tgl_mulai' =>date('Y-m-d', strtotime($today. '+ '.$day.'days')),
                    'tgl_kembali'=>date('Y-m-d', strtotime($today. '+ '.$day.'days')),
                    'category'=> $fake->randomElement(['success', 'danger', 'warning', 'info']),
                    'created_at'=>now(),
                    'updated_at'=>now(),
                ];
            }
        }
        Event::insert($events);
    }
}
