<?php

namespace App\Http\Controllers;

use App\Charts\DashboardChart;
use App\Comment;
use App\Facade\PayPal;
use App\Http\Requests\CreatePost;
use App\Http\Requests\UserUpdate;
use App\Message;
use App\Post;
use App\Product;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('checkRole:admin');
        $this->middleware('auth');
    }

    public function dashboard(){

        $chart = new DashboardChart;

        $days = $this->generateDateRange(Carbon::now()->subDays(30), Carbon::now());

        $posts = [];

        foreach ($days as $day){
            $posts[] = Post::whereDate('created_at', $day)->count();
        }

        $chart->dataset('Posts', 'line', $posts);
        $chart->labels($days);


        return view('admin.dashboard', compact('chart'));
    }

    private function generateDateRange(Carbon $start_date, Carbon $end_date){
        $dates = [];
        for ($date = $start_date; $date->lte($end_date); $date->addDay()){
            $dates[] = $date->format('Y-m-d');
        }
        return $dates;
    }

    public function comments(){
        $comments = Comment::all();

        return view('admin.comments', compact('comments'));
    }

    public function deleteComment($id){
        $comment = Comment::where('id', $id)->first();
        $comment->delete();
        return back();
    }

    public function posts(){
        $posts = Post::all();
        return view('admin.posts',compact('posts'));
    }

    public function postEdit($id){
        $post = Post::where('id', $id)->first();
        return view('admin.editPost', compact('post'));
    }

    public function postUpdate(CreatePost $request, $id){
        $post = Post::where('id', $id)->first();
        $post->title = $request['title'];
        $post->content = $request['content'];
        $post->save();

        return back()->with('success', "Post updated successfully");
    }
    public function postDelete($id){
        $post = Post::where('id', $id)->first();
        $post->delete();

        return back();
    }

    public function users(){
        $users = User::all();
        return view('admin.users', compact('users'));
    }

    public function editUser($id){
        $user = User::where('id', $id)->first();
        return view('admin.editUser', compact('user'));
    }

    public function updateUser(UserUpdate $request, $id){
        $user = User::where('id', $id)->first();

        $user->name = $request['name'];
        $user->email = $request['email'];

        if ($request['author'] == 1){
            $user->author = true;
        }elseif($request['admin'] == 1){
            $user->admin = true;
        }

        $user->save();

        return back()->with('success', 'User updated successfully');
    }

    public function deleteUser($id){
        $user = User::where('id', $id)->first();

        $user->delete();

        return back();
    }

    public function adminProducts(){
        $products = Product::all();
        return view('admin.products', compact('products'));
    }
    public function newProduct(){
        return view('admin.newProduct');
    }

    public function newProductPost(Request $request){
        $this->validate($request, [
            'title' => 'required|string',
            'thumbnail' => 'required|image',
            'description' => 'required',
            'price' => 'required|regex:/^[0-9]+(\.[0-9][0-9]?)?$/'
        ]);
        $product = new Product();

        $product->title = $request['title'];
        $product->description = $request['description'];
        $product->price = $request['price'];

        $thumbnail = $request->file('thumbnail');
        $fileName = $thumbnail->getClientOriginalName();
        $fileExtension = $thumbnail->getClientOriginalExtension();

        $saveFileName = time().'_'.$fileName;

        $thumbnail->move('product-images', $saveFileName);

        $product->thumbnail = 'product-images/'.$saveFileName;

        $product->save();

        return back();
    }

    public function editProduct($id){
        $product = Product::findOrFail($id);
        return view('admin.editProduct', compact('product'));
    }
    public function updateProduct(Request $request, $id){


        $this->validate($request, [
            'title' => 'required|string',
            'thumbnail' => 'image',
            'description' => 'required',
            'price' => 'required|regex:/^[0-9]+(\.[0-9][0-9]?)?$/'
        ]);
        $product = Product::findOrFail($id);

        $product->title = $request['title'];
        $product->description = $request['description'];
        $product->price = $request['price'];

        if ($request->hasFile('thumbnail')){

            $thumbnail = $request->file('thumbnail');
            $fileName = $thumbnail->getClientOriginalName();
            $fileExtension = $thumbnail->getClientOriginalExtension();

            $saveFileName = time().'_'.$fileName;

            $thumbnail->move('product-images', $saveFileName);

            $product->thumbnail = 'product-images/'.$saveFileName;
        }

        $product->save();

        return back();
    }

    public function deleteProduct($id){
        $product = Product::findOrFail($id)->delete();

        return back();
    }

    public function getAllMessage(){
        $messages = Message::all();

        return view('admin.messages', compact('messages'));
    }

    public function deleteMessage($id){

        $message = Message::findOrFail($id)->delete();

        return back();
    }
}















