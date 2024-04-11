<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChatController extends Controller
{
    //
    public function index()
    {
        return view('chat.chatadmin');
    }
    public function view_chat()
    {
        return view('chat.viewchat');
    }
}
