<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Disco;
use App\Rnb;
Use App\Ballad;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{


    public function createDisco(Request $request){

       $this->validate($request, [
            'album_title' => 'required|string|max:255',
            'disco' => 'required|mimetypes:audio/mpeg,application/octet-stream'
       ]);

       if ($request->hasFile('disco')){

           $filenameWithExt = $request->file('disco')->getClientOriginalName();
           $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
           $extension = $request->file('disco')->getClientOriginalExtension();
           $filenameToStore = $filename.'_'.time().'.'.$extension;
           $path = $request->file('disco')->storeAs('public/disco', $filenameToStore);
       }
        $disco = new Disco();
        $disco->album_title = $request->input('album_title');
        $disco->user_id = auth()->user()->id;
        $disco->disco = $filenameToStore;
        $disco->save();
        return redirect('/albums/discoalbum')->with('success', 'Disco music is added');
    }

    public function createRnb(Request $request){
        $this->validate($request, [
            'album_title' => 'required|string|max:255',
            'rnb' => 'required|mimetypes:audio/mpeg,application/octet-stream'
        ]);

        if ($request->hasFile('rnb')){

            $filenameWithExt = $request->file('rnb')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('rnb')->getClientOriginalExtension();
            $filenameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('rnb')->storeAs('public/rnb', $filenameToStore);
        }
        $rnb = new Rnb();
        $rnb->album_title = $request->input('album_title');
        $rnb->user_id = auth()->user()->id;
        $rnb->rnb = $filenameToStore;
        $rnb->save();
        return redirect('/albums/rnbalbum')->with('success', 'Rnb music is added');
    }
    public function createBallads(Request $request){
        $this->validate($request, [
            'album_title' => 'required|string|max:255',
            'ballads' => 'required|mimetypes:audio/mpeg,application/octet-stream'
        ]);

        if ($request->hasFile('ballads')){

            $filenameWithExt = $request->file('ballads')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('ballads')->getClientOriginalExtension();
            $filenameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('ballads')->storeAs('public/ballads', $filenameToStore);
        }
        $ballads = new Ballad();
        $ballads->album_title = $request->input('album_title');
        $ballads->user_id = auth()->user()->id;
        $ballads->ballads = $filenameToStore;
        $ballads->save();
        return redirect('/albums/balladsalbum')->with('success', 'Ballads music is added');
    }

    public function destroyDisco($id){

        $disco = Disco::find($id);
        $disco->delete();
        Storage::delete('public/disco/'.$disco->disco);
        return redirect('/albums/discoalbum')->with('success', 'Disco Deleted');

    }

    public function destroyRnb($id){

        $rnb = Rnb::find($id);

        Storage::delete('public/rnb/'.$rnb->rnb);

        $rnb->delete();

        return redirect('/albums/rnbalbum')->with('success', 'Rnb Deleted');

    }

    public function destroyBallad($id){

        $ballads = Ballad::find($id);
        Storage::delete('public/ballads/'.$ballads->ballads);
        $ballads->delete();
        return redirect('/albums/balladsalbum')->with('success', 'Ballads Deleted');
    }

}
