<?php

use Illuminate\Database\Seeder;
use \App\Event;

class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 1
        Event::create([
            'user_id' => 1,
            'title' => '納涼ピアノ発表会',
            'date' => '2019-6-30',
            'description' => 'エアコンの効いた会場でピアノを聴きながら涼みましょう'
        ]);
        // 2
        Event::create([
            'user_id' => 1,
            'title' => '地獄のピアノ発表会',
            'date' => '2019-8-5',
            'description' => '炎天下の中、汗を流しながらピアノを演奏します'
        ]);
        // 3
        Event::create([
            'user_id' => 1,
            'title' => 'ピアノによる私の発表会',
            'date' => '2019-12-31',
            'description' => '私がピアノを弾いているのではない。ピアノが私を弾いているのだ。'
        ]);
    }
}
