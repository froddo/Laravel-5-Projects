<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Disco;
use App\Rnb;
Use App\Ballad;
use Illuminate\Support\Facades\Storage;

class AlbumController extends Controller
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
    public function viewDiscoAlbum(){
        $disco = Disco::orderBy('created_at','desc')->paginate(5);

        return view('albums.discoalbum')->with('disco', $disco);
    }
    public function viewRnbAlbum(){
        $rnb = Rnb::orderBy('created_at','desc')->paginate(5);
        return view('albums.rnbalbum')->with('rnb', $rnb);
    }
    public function viewBalladsAlbum(){

        $ballad = Ballad::orderBy('created_at', 'desc')->paginate(5);
        return view('albums.balladsalbum')->with('ballad', $ballad);
    }

}
