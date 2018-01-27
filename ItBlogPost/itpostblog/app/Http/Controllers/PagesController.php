<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
class PagesController extends Controller
{
    public function home(){

        $post = Post::orderBy('created_at','desc')->take(3)->get();
        return view('/pages.home')->with('post', $post);
    }
    public function about(){
        return view('pages.about');
    }
    public function contact(){
        return view('pages.contact');
    }
    public function blog(){
        return view('pages.blog');
    }
}
