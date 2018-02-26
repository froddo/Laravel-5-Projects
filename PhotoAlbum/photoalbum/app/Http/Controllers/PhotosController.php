<?php

namespace App\Http\Controllers;

use App\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Filesystem\Filesystem;
class PhotosController extends Controller
{
    public function create($album_id){


        return view('photos.create')->with('album_id', $album_id);
    }
    public function store(Request $request){
        $this->validate($request,[
            'title' => 'required|max:30',
            'description' => 'required|max:500',
            'photo' => 'required|image|max:1999'
        ]);

        //Get filename with extension
        $filenameWithExt = $request->file('photo')->getClientOriginalName();

        //Get just the filename
        $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);

        //Get extension
        $extension = $request->file('photo')->getClientOriginalExtension();

        //Create new filename
        $filenameToStore = $filename.'_'.time().'.'.$extension;

        //Path to storage save images
        // $path = $request->file('cover_image')->storeAs('public/album_covers', $filenameToStore);

        //Path to put save images to public folder
        $request->photo->move(public_path('storage/photos/'.$request->input('album_id')), $filenameToStore);

        //Save photo

        $photo = new Photo();
        $photo->album_id = $request->input('album_id');
        $photo->title = $request->input('title');
        $photo->description = $request->input('description');
        $photo->size = $request->file('photo')->getClientSize();
        $photo->photo = $filenameToStore;

        $photo->save();

        return redirect('/albums/'.$request->input('album_id'))->with('success', 'Photo Uploaded');
    }
    public function show($id){
        $photo = Photo::find($id);
        return view('photos.show')->with('photo', $photo);
    }
    public function destroy($id){

        if (Auth::check() && auth()->user()->id == 1){
            $photo = Photo::find($id);
            unlink(public_path('storage/photos/'.$photo->album_id.'/'.$photo->photo));

            $photo->delete();
            return redirect('/')->with('success', 'Photo Deleted');

        }
        return redirect('/')->with('error', 'Only Admin can delete photo!');

    }
}
