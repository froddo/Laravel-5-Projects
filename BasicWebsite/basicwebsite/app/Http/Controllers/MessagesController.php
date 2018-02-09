<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;

class MessagesController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function submit(Request $request){
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required|email'
        ]);

        $message = new Message();
        $message->name = $request->input('name');
        $message->email = $request->input('email');
        $message->message = $request->input('message');
        $message->user_id = auth()->user()->id;
        $message->save();

        return redirect('/messages')->with('success','Message Sent');
    }

    public function getMessages(){
        $messages = Message::orderBy('created_at', 'desc')->get();

        return view('messages')->with('messages', $messages);
    }

    public function editMessages($id){
        $messages = Message::find($id);

        return view('edit')->with('messages',$messages);
    }

    public function update(Request $request, $id){

        $this->validate($request,[
            'name' => 'required',
            'email' => 'required|email'
        ]);

        $message = Message::find($id);
        $message->name = $request->input('name');
        $message->email = $request->input('email');
        $message->message = $request->input('message');
        $message->save();

        return redirect('/messages')->with('success','Message Updated');
    }

    public function destroy($id){
        $message = Message::find($id);

        $message->delete();
        return redirect('/messages')->with('success','Message Deleted');
    }
}
