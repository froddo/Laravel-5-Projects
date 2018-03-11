<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
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

        $message = Message::all();
        return view('home')->with('message', $message);
    }
}
