@extends('layouts.app')
@inject('image', 'Tmdb\Helper\ImageHelper')

@section('content')
	<h1>{{$location->name}}</h1>
	<p>{{$location->description}}</p>

	@foreach($location->movies as $movie)
		<a href="https://www.themoviedb.org/movie/{{$movie->tmdb_id}}">{!! $image->getHtml($movie->tmdb()->getPosterImage(), 'w154', 260, 420) !!}</a>
	@endforeach

    <div class="row">
        <h2>Add a New Film</h2>
        <form method='GET' action="/movies/search">
        	<input type="hidden" name="l" value="{{$location->id}}"/>
            <div class="form_group">
                <label for="q">Search:</label></th>
                <input name="q" type="text"/>
            </div>
            <div class="form_group">
                <button type="submit">search</button>
            </div>
        </form>
    </div>
@endsection

