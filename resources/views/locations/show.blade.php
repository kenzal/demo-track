@extends('layouts.app')
@inject('image', 'Tmdb\Helper\ImageHelper')

@section('content')
	<h1>{{$location->name}}</h1>
	<p>{{$location->description}}</p>

	@foreach($location->movies as $movie)
		<a href="https://www.themoviedb.org/movie/{{$movie->tmdb_id}}">{!! $image->getHtml($movie->tmdb()->getPosterImage(), 'w154', 260, 420) !!}</a>
	@endforeach
@endsection
