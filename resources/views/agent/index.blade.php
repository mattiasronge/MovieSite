@extends('base')

@section('main')
    @foreach($agents as $agent) 
        <div class="agent">
            <h1>{{ $agent->name }}</h1>
            <h4>Har medverkat i följande filmer:</h4>
            @foreach ($agent->movies as $movie)
                <a href="/movies/{{$movie->id}}"> {{ $movie->title }}, ({{ $movie->year }})</a><br />
            @endforeach
        </div>
    @endforeach
    {{ $agents->links() }}
@endsection