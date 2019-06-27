<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Music extends Model
{
    public function performances() // 複数形
    {
        return $this->hasMany('App\Performance')->latest();
    }
}
