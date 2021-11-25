<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    //
    protected $fillable = [
        'user_id',
        'nickname',
        'image_path',
        'self_introduction'
    ];

    public function user()
    {
        return $this->hasOne('App\User');
    }

    public function nationalities()
    {
        return $this->belongsToMany('App\Nationality');
    }

    public function languages()
    {
        return $this->belongsToMany('App\Language');
    }
}
