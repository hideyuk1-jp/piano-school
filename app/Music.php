<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Event;

class Music extends Model
{
    public function performances() // 複数形
    {
        return $this->hasMany('App\Performance')->latest();
    }

    public function isAddable(Event $event)
    {
        return $event->musicCount($this) < $this->limit;
    }
}
