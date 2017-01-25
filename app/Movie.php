<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'list';

    protected $fillable = ['tmdb_id'];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function location()
    {
    	return $this->belongsTo(Location::class);
    }
}
