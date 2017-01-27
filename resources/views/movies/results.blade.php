@extends('layouts.app')
@inject('image', 'Tmdb\Helper\ImageHelper')

@section('content')
	<h2>Title Search:</h2>
	<form>
		@if($location)
		<input type="hidden" name='l' value="{{$location->id}}"/>
		@endif
		<input type="text" name='q' value="{{htmlentities($query)}}"/>
		<button type="submit">Search</button>
	</form>
	Please select your film(s).
	<form method="POST" action="add">
        {{ csrf_field() }}
		<table>
			<tbody>
				@foreach($results as $movie)
					<tr>
						<td><input type="checkbox", name="film[{{$movie->getId()}}]" /></td>
						<td>{!! $image->getHtml($movie->getPosterImage(), 'w154', 65, 105) !!}</td>
						<td>{{$movie->getTitle()}}<br/>({{$movie->getReleaseDate()->format("Y")}})</td>
						<td>{{$movie->getOverview()}}</td>
					</tr>
				@endforeach
			</tbody>
		</table>
		@if($location)
		<input type="hidden" name='l' value="{{$location->id}}"/>
		@endif
		<button type="submit">Add{{$location ? "to $location->name" : ''}}</button>
	</form>
	
@endsection
