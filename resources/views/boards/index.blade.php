@extends('layouts.app')

@section('content')
    @foreach($boards as $board)
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $board->topic }} <span class="badge badge-secondary">{{ $board->status }}</span></h5>
                <p class="card-text">{{ $board->user->name }}</p>
                <a href="/boards/{{ $board->id }}" class="btn btn-primary">Link...</a>
            </div>
        </div>
    @endforeach
    <create-button></create-button>
@endsection