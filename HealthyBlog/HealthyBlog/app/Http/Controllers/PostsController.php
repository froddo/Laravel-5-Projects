<?php

namespace App\Http\Controllers;

use App\Post;
use App\Message;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    //Create Post
    public function post(){
        return view('pages.post');
    }

    //Submit Post
    public function submit(Request $request){
        $this->validate($request,[
            'subject' => 'required',
            'title' => 'required',
            'description' => 'required'
        ]);
        //Check correct user
        if (auth()->id() == 1){
            $post = new Post();
            $post->subject = $request->input('subject');
            $post->title = $request->input('title');
            $post->description = $request->input('description');

            $post->save();
            return redirect('/post')->with('success', 'Post Added');
        } else {
            return redirect('/post')->with('error', 'Only Admin Can Add Post!');
        }

    }

    //Edit Post
    public function edit($id){
        $post = Post::find($id);
        return view('/show/edit')->with('post', $post);
    }

    //Update Post
    public function update(Request $request, $id){
        $this->validate($request,[
            'subject' => 'required',
            'title' => 'required',
            'description' => 'required'
        ]);
        //Check correct user
        if (auth()->id() == 1){
            $post = Post::find($id);
            $post->subject = $request->input('subject');
            $post->title = $request->input('title');
            $post->description = $request->input('description');
            $post->save();
            return redirect('/post')->with('success', 'Post Updated');
        } else {
            return redirect('/post')->with('error', 'Only Admin Can Update Post!');
        }

    }

    //Delete Post
    public function destroy($id){
        //Check correct user
        if (auth()->id() == 1){
            $post = Post::find($id);
            $post->delete();
            return redirect('/post')->with('success', 'Post Removed');
        } else {
            return redirect('/post')->with('error', 'Only Admin Can Delete Post!');
        }

    }

    //Submit contact message
    public function message(Request $request){
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required'
        ]);
        $message = new Message();
        $message->name = $request->input('name');
        $message->email = $request->input('email');
        $message->message = $request->input('message');
        $message->save();
        return redirect('/contact')->with('success', 'Message Sent Successfully');
    }
    //Delete Message
    public function deleteMessage($id){
        //Check correct user
        if (auth()->id() == 1){
            $message = Message::find($id);
            $message->delete();
            return redirect('/home')->with('success', 'Message Removed');
        } else {
            return redirect('/home')->with('error', 'Only Admin Can Delete Message!');
        }
    }

}
