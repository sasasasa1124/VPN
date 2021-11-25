<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    protected $fillable = ['language'];
    
    public function profiles()
    {
        return $this->belongsToMany('App\Profile');
    }
}
