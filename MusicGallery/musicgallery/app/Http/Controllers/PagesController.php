<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth',['except' => ['index']]);
    }


    public function index(){
        return view('pages.index');
    }
    public function disco(){
        return view ('pages.disco');
    }
    public function rnb(){
        return view('pages.rnb');
    }
    public function ballads(){
        return view('pages.ballads');
    }
}
