<?php

namespace App\Http\Controllers;

use App\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Tmdb\Repository\MovieRepository;

class LocationsController extends Controller
{
	protected $tmdb;

	public function __construct(MovieRepository $tmdbClient)
	{
		$this->tmdb = $tmdbClient;
	}

    public function index() 
    {

    	$locations = Auth::user()->locations;
    	return view('locations.index', compact('locations'));
    }

    public function show(Location $location)
    {
    	if(Auth::user() <> $location->user)
    	{
    		return back();
    	}
    	$tmdb = $this->tmdb;
    	foreach($location->movies as $movie) {
    		$movie->setTmdb($tmdb->load($movie->tmdb_id));
    	}
    	return view('locations.show', compact('location'));
    }

    public function store(Request $request)
    {
    	$location              = new Location;
    	$location->name        = $request->name;
    	$location->description = $request->description;

    	$user = $request->user();
    	$user->locations()->save($location);

    	return back();
    }
}
