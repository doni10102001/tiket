<?php

namespace App\Http\Controllers\user;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Message;
use Auth;
use Alert;

class MessageController extends Controller
{
   
    public function store(Request $request)
    {
        $message = new Message;
        $message->email = $request->email;
        $message->message = $request->message;
        $message->save();

        Alert::success('Terkirim', 'Success');
        return redirect()->route('home');
    }

   
}
