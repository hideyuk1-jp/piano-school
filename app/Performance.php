<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Performance extends Model
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

    /**
     * リレーション (従属の関係)
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function performer() // 単数形
    {
        return $this->belongsTo('App\User', 'performer_id');
    }

    /**
     * リレーション (従属の関係)
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function music() // 単数形
    {
        return $this->belongsTo('App\Music');
    }

    /**
     * リレーション (従属の関係)
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function event() // 単数形
    {
        return $this->belongsTo('App\Event');
    }

}
