@extends('base')

@section('main')
<a href="{{ route('agents.create') }}" target="" class="btn btn1 padding1 pull-right">Add agents</a>
    <div style="clear:both"></div>
    @foreach($agents as $agent) 
        <div class="agent">
            <div style="width:80%;float:left;"><h1>{{ $agent->name }}</h1></div>
            <div style="width:19%;float:left;">
                <form action="{{ route('agents.destroy', $agent->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <a href="{{ route('agents.edit', $agent->id) }}" target="" class="btn border2 margin1" >Edit</a>
                  <button class="btn border3 margin1" type="submit">Delete</button>
                 
                </form>
                <!-- <a href="{{ route('agents.destroy', $agent->id) }}" target="" class="btn border3 pull-right">Delete</a> -->
                
            </div>
            <div style="clear:both; width:100%;">
            <h4>Har medverkat i följande filmer:</h4>
            @foreach ($agent->movies as $movie)
                <a href="/movies/{{$movie->id}}"> {{ $movie->title }}, ({{ $movie->year }})</a><br />
            @endforeach
            </div>
        </div>
    @endforeach
    {{ $agents->links() }}
@endsection