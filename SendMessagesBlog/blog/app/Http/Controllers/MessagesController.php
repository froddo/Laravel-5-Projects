<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;

class MessagesController extends Controller
{
    public function submit(Request $request){
        $this->validate($request, [
           'name' => 'required',
            'email' => 'required'
        ]);
        $message=new Message;
        $message->name = $request->input('name');
        $message->email = $request->input('email');
        $message->message = $request->input('message');
        $message->save();
        return redirect('/')->with('success','Message Sent');
    }

    public function getMessages(){
        //$messages = Message::all(); order by asc
        $messages= Message::orderBy();
        return view('messages')->with('messages', $messages);
    }


    public static function check(){

        return redirect('/messages')->with('info','No Message Yet');


    }
}
