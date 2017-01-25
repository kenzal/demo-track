<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function movies()
    {
    	return $this->hasMany(Movie::class);
    }
}
