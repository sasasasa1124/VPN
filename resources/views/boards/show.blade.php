@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card-box">
            <h4 class="text-dark header-title">{{ $board->topic }}</h4>
            <p class="text-muted font-13">{{ $board->user->name }}</p>
                @foreach($comments as $comment)
                    <div class="card">
                        <p class="float-right">
                            {{ $comment->body }}
                        </p>
                        <p class="mb-0">
                            <a href="" class="text-muted"><img src="#" alt="task-user" class="thumb-sm rounded-circle mr-2"> <span class="font-bold font-secondary">{{ $comment->user->name }}</span></a>
                        </p>
                    </div>
                @endforeach
            <form action="{{ action('CommentController@store') }}" method="POST" role="form" class="board-form">
                @csrf
                <div class="form-group">
                    <label for="body">comment</label>
                    <input type="text" class="form-control" id="body" name="body" placeholder="leave your comment...">
                </div>
                <input type="hidden" name="board_id" value="{{ $board->id }}">
                <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
    </div>        
            
@endsection