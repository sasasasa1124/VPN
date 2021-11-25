<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nationality extends Model
{
    protected $fillable = ['nationality'];
    
    public function profiles()
    {
        return $this->belongsToMany('App\Profile');
    }
}
