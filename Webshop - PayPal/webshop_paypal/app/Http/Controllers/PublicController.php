<?php

namespace App\Http\Controllers;

use App\Message;
use App\Post;
use Illuminate\Http\Request;


class PublicController extends Controller
{
    public function index(){
        $posts = Post::paginate(2);
        return view('welcome')->with('posts', $posts);
    }

    public function singlePost(Post $post){

        return view('singlePost')->with('post', $post);
    }

    public function about(){
        return view('about');
    }
    public function contact(){
        return view('contact');
    }
    public function contactPost(Request $request){
       $this->validate($request, [
          'name' => 'required|string|max:255',
           'email' => 'required|string|email|max:255',
           'message' => 'required'
       ]);

        $message = new Message();

        $message->name = $request['name'];
        $message->email = $request['email'];

        if ($request['phone'] == null){
            $message->phone = 12345;

        } else {
            $message->phone = $request['phone'];
        }


        $message->message = $request['message'];
        $message->save();

        return back()->with('success', 'Message send successfully');
    }
}
