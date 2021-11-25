<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    //
    protected $fillable = [
        'user_id', 'topic'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
