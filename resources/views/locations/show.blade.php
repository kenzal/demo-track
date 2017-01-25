@extends('layouts.app')

@section('content')
<h1>{{$location->name}}</h1>
<p>{{$location->description}}</p>

<ul>
@foreach($location->movies as $movie)
<li><a href="https://www.themoviedb.org/movie/{{$movie->tmdb_id}}">{{$movie->tmdb_id}}</a></li>
@endforeach
</ul>
@endsection
