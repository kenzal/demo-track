<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Tmdb\Laravel\Facades\Tmdb;

class Movie extends Model
{

	protected $tmdbObject;

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

    public function tmdb()
    {	
    	return $this->tmdbObject;
    }

    public function setTmdb($data)
    {
    	$this->tmdbObject = $data;
    	return $this;
    }
    public function setTmdbId(int $tmdbId)
    {
        $this->tmdb_id = $tmdbId;
        return $this;
    }
}
