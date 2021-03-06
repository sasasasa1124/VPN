<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Advertisement extends Model
{
    //
    protected $fillable = [
        'user_id',
        'communicationLanguage',
        'title',
        'body'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
