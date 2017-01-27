<?php

namespace App\Http\Controllers;

use App\Location;
use App\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Tmdb\Helper\ImageHelper;
use Tmdb\Repository\MovieRepository;
use Tmdb\Repository\SearchRepository;
use Tmdb\Model\Search\SearchQuery\MovieSearchQuery;

class MovieController extends Controller
{

    private $movies;
    private $helper;

    public function __construct(MovieRepository $movies, ImageHelper $helper, SearchRepository $search)
    {
        $this->movies = $movies;
        $this->helper = $helper;
        $this->search = $search;
    }

    public function search(Request $request)
    {
        $query    =  $request->input('q', 'batman');
        $location = Location::where('id', (int)$request->l)
                            ->where('user_id', Auth::user()->id)
                            ->first();
        $results  = $this->search->searchMovie($query, new MovieSearchQuery);
        return view('movies.results', compact('results', 'location', 'query'));
        return $results;
    }

    public function add(Request $request)
    {
        $location = Location::where('id', (int)$request->l)
                            ->where('user_id', Auth::user()->id)
                            ->first();
        foreach($request->film as $tmdbId=>$selected) {
            $movie = new Movie;
            $movie->setTmdbID($tmdbId);
            $movie->user()->associate(Auth::user());
            if($location) {
                $movie->location()->associate($location);
            }
            $movie->save();
        }
        if($request->l)
        {
            return redirect("/location/{$request->l}");
        }
        return redirect('/home');
    }
}

