@extends('layouts.app')

@section('content')
<form action="{{ action('BoardController@store') }}" method="POST" role="form" class="board-form">
    @csrf
    <div class="form-group">
        <label for="topic">Topic</label>
        <input type="topic" class="form-control" id="topic" name="topic" placeholder="what do you wanna talk about?">
    </div>
    <input type="hidden" name="user_id" value="{{ Auth::id() }}">
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection