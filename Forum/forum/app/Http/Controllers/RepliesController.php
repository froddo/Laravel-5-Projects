<?php

namespace App\Http\Controllers;

use App\Reply;
use App\Like;
use Illuminate\Http\Request;
use Auth;
use Session;

class RepliesController extends Controller
{
    public function like($id){

        Like::create([
            'reply_id' =>$id,
            'user_id' => Auth::id()
        ]);

        $reply = Reply::find($id);
        $reply->user->points += 10;
        $reply->user->save();


        Session::flash('success', 'You like the reply');

        return redirect()->back();
    }

    public function unlike($id){
        $like = Like::where('reply_id', $id)->where('user_id', Auth::id())->first();

        $reply = Reply::find($id);
        $reply->user->points -= 10;
        $reply->user->save();

        $like->delete();

        Session::flash('success', 'You unlike the reply');

        return redirect()->back();
    }

    public function best_answer($id){
        $reply = Reply::find($id);

        $reply->best_answer = 1;

        $reply->save();

        $reply->user->points += 50;

        $reply->user->save();

        Session::flash('success', 'Reply has been marked as the best answer');

        return redirect()->back();
    }

    public function edit($id){
        $reply = Reply::find($id);

        return view('replies.edit')->with('reply', $reply);
    }

    public function update(Request $request, $id){
       $this->validate($request, [
          'content' => 'required'
       ]);

       $reply = Reply::find($id);

       $reply->content = $request->input('content');

       $reply->save();

       Session::flash('success', 'Reply updated');

        return redirect()->route('discussion', [$reply->discussion->slug]);
    }

    public function destroy($id){
        $reply = Reply::find($id);


        $reply->user->points -= 15;
        $reply->user->save();
        $reply->delete();

        Session::flash('success', 'Reply Deleted');

        return redirect()->back();
    }
}
