<?php

namespace App\Http\Controllers;

use DB;
use App\Payment;
use Illuminate\Http\Request;

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
        //this is work
        //$user_id = auth()->user()->id;
        //$payment = DB::select('SELECT * FROM payments WHERE user_id="'.$user_id.'" ORDER BY created_at DESC');

        $payment = Payment::where('user_id',auth()->user()->id)->orderBy('created_at', 'desc')->get();
        return view('home')->with('payment', $payment);
    }
}
