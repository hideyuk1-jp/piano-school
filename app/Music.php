<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Event;
use App\Performance;

class Music extends Model
{
    public function performances() // 複数形
    {
        return $this->hasMany('App\Performance')->latest();
    }

    public function isAddable(Event $event, Performance $old_performance = NULL)
    {
        if (!is_null($old_performance) && $old_performance->music_id === $this->id && $old_performance->event_id === $event->id) {
            // 曲と発表会に変更のない更新の場合は1（自分）減らして判定
            return $event->musicCount($this) - 1 < $this->limit;
        } else {
            return $event->musicCount($this) < $this->limit;
        }
    }
}
