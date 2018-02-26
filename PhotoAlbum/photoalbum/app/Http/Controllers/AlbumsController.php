<?php

namespace App\Http\Controllers;

use App\Album;
use Illuminate\Http\Request;
use App\Photo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Filesystem\Filesystem;
class AlbumsController extends Controller
{
    public function index(){

        $albums = Album::with('Photos')->orderBy('created_at', 'desc')->get();

        return view('albums.index')->with('albums', $albums);
    }

    public function create(){
        return view('albums.create');
    }

    public function store(Request $request){
        $this->validate($request,[
            'name' => 'required|max:30',
            'description' => 'required|max:500',
            'cover_image' => 'image|max:1999'
        ]);

        //Get filename with extension
        $filenameWithExt = $request->file('cover_image')->getClientOriginalName();

        //Get just the filename
        $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);

        //Get extension
        $extension = $request->file('cover_image')->getClientOriginalExtension();

        //Create new filename
        $filenameToStore = $filename.'_'.time().'.'.$extension;

        //Path to storage save images
        // $path = $request->file('cover_image')->storeAs('public/album_covers', $filenameToStore);

        //Path to put save images to public folder
        $request->cover_image->move(public_path('storage/album_covers'), $filenameToStore);

        //Save album

        $album = new Album();

        $album->name = $request->input('name');
        $album->description = $request->input('description');
        $album->cover_image = $filenameToStore;

        $album->save();

        return redirect('/albums')->with('success', 'Album Created');
    }
    public function show($id){
        $album = Album::with('Photos')->find($id);
        return view('albums.show')->with('album', $album);
    }

    public function destroy($id){
        if (Auth::check() && auth()->user()->id == 1){

            $album = Album::find($id);
            $file = new Filesystem;
            $file->cleanDirectory(public_path('storage/photos/'.$album->id));

            unlink(public_path('storage/album_covers/'.$album->cover_image));
            $a = Photo::where('album_id', '=',$album->id)->delete();

            $album->delete();

            return redirect('/')->with('success', 'Album Deleted');
        }
        return redirect('/')->with('error', 'Only Admin can delete album!');

    }

    public function search(){
        $albums = Album::with('Photos')->get();
        return view('albums.search')->with('albums', $albums);
    }

}
