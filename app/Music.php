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

}
