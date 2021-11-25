<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Board;
use App\Comment;

class BoardController extends Controller
{
    // 
    public function index()
    {
        return view('boards.index')->with(['boards' => Board::all()]);
    }

    public function show(Board $board)
    {
        $comments = Comment::where('board_id', $board->id)->get();
        return view('boards.show')->with(['board' => $board, 'comments' => $comments]);
    }

    public function create()
    {
        return view('boards.create');
    }

    public function store(Request $request, Board $board)
    {
        $input = $request->all();
        $board->fill($input)->save();
        return redirect('boards.index');
    }
}

