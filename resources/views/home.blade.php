@extends('layouts.app')
@inject('image', 'Tmdb\Helper\ImageHelper')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are logged in!
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        @foreach($movies as $movie)
            <div style="float:left;width:130px;text-align:center;">
                {!! $image->getHtml($movie->tmdb()->getPosterImage(), 'w154', 130, 210) !!}<br/>
                {{$movie->tmdb()->getTitle()}}<br/>({{$movie->tmdb()->getReleaseDate()->format("Y")}})</td>
            </div>
        @endforeach
    </div>
    <div class="row">
        <h2>Add a New Film</h2>
        <form method='GET' action="/movies/search">
            <div class="form_group">
                <label for="q">Search:</label></th>
                <input name="q" type="text"/>
            </div>
            <div class="form_group">
                <button type="submit">search</button>
            </div>
        </form>
    </div>
</div>
@endsection
