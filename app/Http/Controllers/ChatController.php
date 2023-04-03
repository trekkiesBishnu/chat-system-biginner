<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\MessageEvent;

class ChatController extends Controller
{
    public function index(){
        return view('chat.index');
    }
    public function broadcastMessage(Request $request){
        event (new MessageEvent($request->username,$request->message));
    }
}
