<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

    public function search()
    {

        $results = $this->search->searchMovie('batman', new MovieSearchQuery);
        dd($results);
        return $results;
    }
}

