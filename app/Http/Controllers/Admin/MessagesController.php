<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Msg;
use App\Personal_info;

class MessagesController extends Controller
{
    public function index()
    {
        $portfolio = Personal_info::where('id', '1')->first();
        $messages = Msg::latest()->get();
        return view('admin.messages.messages', compact('portfolio', 'messages'));
    }
    public function load(){
    	$messages = Msg::latest()->get();
        return view('admin.messages.loadmessages', compact('messages'));
    }

    public function destroy(Msg  $message)
    {
        return response()->json(['success' => $message->delete()]);
    }

    public function show(Msg  $message)
    {
        return view("admin.messages.msgview", compact("message"));
    }
}
