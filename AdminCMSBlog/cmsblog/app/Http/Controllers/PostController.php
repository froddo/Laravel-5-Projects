<?php

namespace App\Http\Controllers;

use Auth;
use App\Tag;
use Illuminate\Support\Facades\Storage;
use PHPUnit\Util\Filesystem;
use Session;
use App\Category;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File as LaraFile;
class PostController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();

        return view('admin.posts.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        if ($categories->count() == 0 || $tags->count() == 0){

            Session::flash('info', 'You must have some categories and tags before attempting to create a post.');

            return redirect()->back();
        }

        return view('admin.posts.create')->with('categories', $categories)->with('tags', $tags);
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
           'title' => 'required|max:255',
           'featured' => 'required|image',
            'content' => 'required',
            'category_id' => 'required',
            'tags' => 'required'
        ]);

        $user_id = Auth::user()->id;

        $featured = $request->featured;
        $featured_new_name = time().$featured->getClientOriginalName();
        $featured->move('uploads/posts',$featured_new_name);

        $post = Post::create([
            'title' => $request->title,
            'content' => $request->input('content'),
            'featured' => 'uploads/posts/'.$featured_new_name,
            'category_id' => $request->category_id,
            'slug' => str_slug($request->title),
            'user_id' => $user_id
        ]);

        $post->tags()->attach($request->tags);


        Session::flash('success', 'Post Created');
        return redirect('/post');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $post = Post::find($id);

       $categories = Category::all();

       $tags = Tag::all();

       return view('admin.posts.edit')->with('post', $post)->with('categories', $categories)->with('tags', $tags);
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
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required',
            'category_id' => 'required'
        ]);

        $post = Post::find($id);

        if ($request->hasFile('featured')){
            $featured = $request->featured;

            $featured_new_name = time().$featured->getClientOriginalName();

            $featured->move('uploads/posts', $featured_new_name);

            $post->featured = 'uploads/posts/'.$featured_new_name;
        }

        $post->title = $request->title;
        $post->content = $request->input('content');
        $post->category_id = $request->category_id;

        $post->save();

        $post->tags()->sync($request->tags);

        Session::flash('success', 'Post updated successfully');
        return redirect('/post');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();

        Session::flash('success', 'Post Trashed');

        return redirect()->back();
    }

    public function trashed(){
        $posts = Post::onlyTrashed()->get();

        return view('admin.posts.trashed')->with('posts', $posts);
    }

    public function kill($id){
        $post = Post::withTrashed()->where('id', $id)->first();
        $link = $post->featured;
        $image = explode('/', $link);

        $image_path = public_path().'/uploads/posts/'.$image[5];
        unlink($image_path);

       $post->forceDelete();

       Session::flash('success','Post deleted permanently');

       return redirect()->back();
    }

    public function restore($id){
        $post = Post::withTrashed()->where('id', $id)->first();

        $post->restore();

        Session::flash('success', 'Post restored successfully');

       return redirect()->back();
    }

}
