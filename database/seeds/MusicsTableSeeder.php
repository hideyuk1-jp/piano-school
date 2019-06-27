<?php

use Illuminate\Database\Seeder;
use \App\Music;

class MusicsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 1
        Music::create([
            'title' => '小犬のワルツ',
            'composer' => 'ショパン',
            'limit' => 1
        ]);
        // 2
        Music::create([
            'title' => '幻想即興曲',
            'composer' => 'ショパン',
            'limit' => 2
        ]);
        // 3
        Music::create([
            'title' => '月の光',
            'composer' => 'ドビュッシー',
            'limit' => 1
        ]);
        // 4
        Music::create([
            'title' => 'メヌエット　ト長調',
            'composer' => 'バッハ',
            'limit' => 2
        ]);
    }
}
