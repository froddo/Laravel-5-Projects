<?php

namespace App\Http\Controllers;

use App\Market;
use App\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{
    public function home(){
        return view('pages.home');
    }
    public function contact(){
        return view('pages.contact');
    }
    public function market(){

        return view('pages.market');
    }

    public function photoSubmit(Request $request){
        $this->validate($request,[
            'title' => 'required|min:3|max:30',
            'photo' => 'required|image',
            'description' => 'required'
        ]);

        if (Auth::id() == 1 && Auth::user()->created_at == "2018-02-14 19:47:02"){

            if ($request->hasFile('photo')){
                //upload photo
                $filenameWithExt = $request->file('photo')->getClientOriginalName();
                $filename = pathinfo($filenameWithExt ,PATHINFO_FILENAME);
                $extension = $request->file('photo')->getClientOriginalExtension();
                $fileNameToStore = $filename . '_' . time() .  '.' . $extension;
                $path = $request->file('photo')->storeAs('public/photos/'. $request->input('id'),$fileNameToStore);
            }

            $market = new Market();
            $market->title = $request->input('title');
            $market->photo = $fileNameToStore;
            $market->description = $request->input('description');
            $market->save();

            $request->session()->flash('success','Record successfully added!');
            return view('pages.market');

        } else {
            $request->session()->flash('error','Only Admin Can Add Photo!');
            return redirect('/market');
        }
    }

    public function show(){
        $market = Market::orderBy('created_at', 'desc')->get();

        return view('pages.show')->with('market', $market);

    }
    public function photoshow($id){
        $photo = Market::find($id);
        return view('pages.photoshow')->with('photo', $photo);
    }

    public function messages(Request $request){
        $this->validate($request,[
            'name' => 'required|min:3|max:30',
            'email' => 'required|email',
            'subject' => 'required',
            'description' => 'required'
        ]);

        $message = new Message();
        $message->name = $request->input('name');
        $message->email= $request->input('email');
        $message->subject = $request->input('subject');
        $message->description = $request->input('description');
        $message->save();

        $request->session()->flash('success','Message successfully added!');
        return view('pages.contact');
    }
    public function showMessage(){

        $message = Message::orderBy('created_at', 'desc')->get();

        return view('pages.message')->with('message', $message);
    }
}
