<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use Illuminate\Foundation\Console\Presets\React;
use Illuminate\Support\Facades\Auth;

use App\Events\MessageSent;

class MessageController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('verified');
    }

    public function index()
    {
        return view('messages.index');
    }

    public function fetch()
    {
        return Message::with('user')->get();
    }

    public function create(Request $request)
    {
        $user = Auth::user();
        $message = $user->messages()->create([
            'message' => $request->input('message'),
            'group_id' => request('group_id')
        ]);
        return ['status' => 'Message Sent!'];
    }

    public function sendMessage(Request $request)
    {
      $user = Auth::user();
    
      $message = $user->messages()->create([
        'message' => $request->input('message'),
        'group_id' => $request->input('group_id')
      ]);
    
      broadcast(new MessageSent($user, $message))->toOthers();
    
      return ['status' => 'Message Sent!'];
    }
}
