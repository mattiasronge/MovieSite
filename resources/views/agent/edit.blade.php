@extends('base')

@section('main')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Edit Agents
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('agents.update', $agent->id) }}">
        @method('PATCH')
        @csrf
        <div class="form-group">
          <label for="name">Name:</label>
          <input type="text" class="form-control" name="name" value={{ $agent->name }} />
        </div>
        <div class="form-group">
          <label for="birthday">Birthday :</label>
          <input type="date" class="form-control" name="birthday" value={{ $agent->birthday }} />
        </div>
        <div class="form-group">
          <label for="country">Country:</label>
          <input type="text" class="form-control" name="country" value={{ $agent->country }} />
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
      </form>
  </div>
</div>
@endsection