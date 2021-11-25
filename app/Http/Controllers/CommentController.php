<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Comment;

class CommentController extends Controller
{
    //
    public function store(Request $request, Comment $comment)
    {
        $input = $request->all();
        $comment->fill($input)->save();
        return redirect('boards/'. $input["board_id"]);
    }
}
