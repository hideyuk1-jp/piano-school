<?php

use Illuminate\Database\Seeder;
use \App\Performance;

class PerformancesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Performance::create([
            'event_id' => 1,
            'user_id' => 1,
            'performer_id' => 32,
            'music_id' => 1
        ]);
        Performance::create([
            'event_id' => 1,
            'user_id' => 2,
            'performer_id' => 33,
            'music_id' => 2
        ]);
        Performance::create([
            'event_id' => 1,
            'user_id' => 3,
            'performer_id' => 34,
            'music_id' => 3
        ]);
    }
}
