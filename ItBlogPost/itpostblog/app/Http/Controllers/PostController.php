<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Post;
use DB;
use App\User;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //$posts = DB::select('SELECT * FROM posts');
        //$posts = Post::orderBy('title','desc')->take(1)->get();
        $posts= Post::orderBy('created_at','desc')->paginate(5);
        return view('posts.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
           'title' => 'required',
            'body' => 'required',
            'cover_image' => 'image|nullable|max:1999'
        ]);

        //file upload
        if ($request->hasFile('cover_image')){
            //get filename with extension
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            //get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //get jus extension
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            //filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //upload image
            $path = $request->file('cover_image')->storeAs('public/cover_image',$fileNameToStore);
        }
        else {
            $fileNameToStore = 'noimage.jpg';
        }

        $post = new Post();
        $post->title= $request->input('title');
        $post->body= $request->input('body');
        $post->user_id = auth()->user()->id;
        $post->cover_image = $fileNameToStore;
        $post->save();
        return redirect('/posts')->with('success','Post Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $post= Post::find($id);
       if ($post == null){
           return view('errors.404')->with('success');
       }
       return view('posts.show')->with('post',$post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post= Post::find($id);

        if (auth()->user()->id !== $post->user_id){
            return redirect('/posts')->with('error', 'Unauthorized Page');
        }
        return view('posts.edit')->with('post',$post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $this->validate($request,[
            'title' => 'required',
            'body' => 'required',
            'cover_image' => 'image|nullable|max:1999'
        ]);

        //Edit file upload
        if ($request->hasFile('cover_image')){
            //get filename with extension
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            //get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //get just extension
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            //filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //upload image
            $path = $request->file('cover_image')->storeAs('public/cover_image',$fileNameToStore);
        }

        //create post
        $post = Post::where([
            'id' => $id,
            'user_id' => auth()->user()->id
        ])->firstOrFail();

        $post->title= $request->input('title');
        $post->body= $request->input('body');

        if ($post->cover_image == 'noimage.jpg'){
            $post->cover_image = $fileNameToStore;
            $post->save();
            return redirect('/posts')->with('success','Post Updated');
        }
        else if ($request->hasFile('cover_image')) {
            Storage::delete('public/cover_image/' . $post->cover_image);
            $post->cover_image = $fileNameToStore;
        }
        $post->save();
        return redirect('/posts')->with('success','Post Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post= Post::find($id);

        //check users is correct
        if (auth()->user()->id !== $post->user_id){
            return redirect('/posts')->with('error', 'Unauthorized Page');
        }
        if ($post->cover_image != 'noimage.jpg'){
            //delete image
            Storage::delete('public/cover_image/'.$post->cover_image);
        }
        $post->delete();
        return redirect('/posts')->with('success',$post->title.' Deleted');
    }
}
