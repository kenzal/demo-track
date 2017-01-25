<?php

namespace App\Http\Controllers;

use App\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LocationsController extends Controller
{
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
