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
        for ($i = 0; $i < 30; $i++) {
            for ($j = 1; $j <= 3; $j++) {
                Performance::create([
                    'event_id' => $j,
                    'user_id' => 1 + $i,
                    'performer_id' => 32 + $i,
                    'music_id' => 1 + $i
                ]);
            }
        }
    }
}
