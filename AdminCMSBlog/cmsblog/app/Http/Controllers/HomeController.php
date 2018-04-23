<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\User;
use App\Tag;
class HomeController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home')->with('post_count' , Post::all()->count())->with('trash_count', Post::onlyTrashed()->get()->count())->with('user_count', User::all()->count())->with('category_count', Category::all()->count())->with('tag_count', Tag::all()->count());

    }
}
