<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
class PagesController extends Controller
{
    public function home(){
        $post = Post::where('subject', 'здравословно')->get();
        return view('pages.home')->with('post', $post);
    }
    public function about(){
        return view('pages.about');
    }
    public function contact(){
        return view('pages.contact');
    }
    public function yoga(){

        $post = Post::where('subject', 'йога')->get();
        return view('pages.yoga')->with('post', $post);
    }
    public function findYoga($id){
        $post = Post::find($id);
        return view('show.showYoga')->with('post', $post);
    }

    public function food(){
        $post = Post::where('subject', 'здравословно')->get();
        return view('pages.food')->with('post', $post);
    }
    public function findFood($id){
        $post = Post::find($id);
        return view('show.showFood')->with('post', $post);
    }

    public function hobbies(){
        $post = Post::where('subject', 'хоби')->get();
        return view('pages.hobbies')->with('post', $post);
    }
    public function findHobbies($id){
        $post = Post::find($id);
        return view('show.showHobbies')->with('post', $post);
    }

    public function music(){
        $post = Post::where('subject', 'музика')->get();
        return view('pages.music')->with('post', $post);
    }
    public function findMusic($id){
        $post = Post::find($id);
        return view('show.showMusic')->with('post', $post);
    }
    public function blog(){
        $post = Post::where('subject', 'блог')->get();
        return view('pages.blog')->with('post', $post);
    }

}
