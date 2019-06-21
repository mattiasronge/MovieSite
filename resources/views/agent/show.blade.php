@extends('base')

@section('main')
    <div>
        <h1>{{ $agent->name}}</h1>
        <p>Kommer från {{ $agent->country }} </p>    
        <h3>Har varit med i följande filmer</h3>
        @foreach ($agent->movies as $movie)
            <a href="/movies/{{$movie->id}} "> {{ $movie->title }}, ({{ $movie->year }}) </a><br/>
        @endforeach
    </div> 
@endsection