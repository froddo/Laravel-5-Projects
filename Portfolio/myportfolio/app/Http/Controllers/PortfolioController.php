<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;

class PortfolioController extends Controller
{

    public function portfolio(){
        return view('portfolio');
    }

    public function submit(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'message' => 'required'
        ]);

        $message = new Message();
        $message->name = $request->input('name');
        $message->email = $request->input('email');
        $message->message = $request->input('message');
        $message->save();

        return redirect('/')->with('success', 'Thank you! Your message has been sent successfully');
    }
}
