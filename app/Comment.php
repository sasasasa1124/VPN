<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $fillable = [
        'body', 'board_id', 'user_id'
    ];

    public function board()
    {
        return $this->belongsTo('App\Comment');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
