<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Tmdb\Repository\MovieRepository;

class HomeController extends Controller
{
    protected $tmdb;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(MovieRepository $tmdbClient)
    {
        $this->tmdb = $tmdbClient;
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tmdb = $this->tmdb;
        $movies = Auth::user()->movies;
        foreach($movies as $movie) {
            $movie->setTmdb($tmdb->load($movie->tmdb_id));
        }
        return view('home', compact('movies'));
    }
}
