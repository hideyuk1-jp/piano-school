<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Performance;
use App\Music;

class Event extends Model
{
    /**
     * リレーション (従属の関係)
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user() // 単数形
    {
        return $this->belongsTo('App\User');
    }

    public function performances() // 複数形
    {
        return $this->hasMany('App\Performance')->latest();
    }

    public function musicCount(Music $music, Performance $my_performance = NULL)
    {
        if (is_null($my_performance)) {
            return Performance::where('music_id', $music->id)->where('event_id', $this->id)->count();
        } else {
            // 自分自身をカウントしない
            return Performance::where('id', '<>', $my_performance->id)->where('music_id', $music->id)->where('event_id', $this->id)->count();
        }
    }

    public function isAddableMusic(Music $music, Performance $my_performance = NULL)
    {
        return $this->musicCount($music, $my_performance) < $music->limit;
    }

    public function addableMusics()
    {
        $addable_music_ids = [];
        foreach (Music::all() as $music) {
            if ($this->musicCount($music) < $music->limit) {
                $addable_music_ids[] = $music->id;
            }
        }

        return Music::whereIn('id', $addable_music_ids)->get();
    }
}
