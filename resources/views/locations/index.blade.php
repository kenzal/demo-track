@extends('layouts.app')

@section('content')
    <h1>All Locations</h1>
    @foreach ($locations as $location)
        <div> <a href="/location/{{$location->id}}">{{ $location->name }} &ndash; {{ $location->description}}</a> </div>
    @endforeach

    <hr/>
    <h2>Add a New Location</h2>
    <form method='POST'>
        {{ csrf_field() }}
        <div class="form_group">
            <label for="name">Location Name:</label></th>
            <input name="name" type="text"/>
        </div>
        <div class="form_group">
            <label for="description">Description:</label>
            <textarea name="description"></textarea>
        </div>
        <div class="form_group">
            <button type="submit">Add Location</button>
        </div>
    </form>
@endsection
