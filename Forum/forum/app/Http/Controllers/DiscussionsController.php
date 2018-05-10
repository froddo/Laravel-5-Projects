<?php

namespace App\Http\Controllers;

use App\Discussion;
use App\Reply;
use App\User;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\App;
use Session;
use Notification;
use GrahamCampbell\Markdown\Facades\Markdown;

class DiscussionsController extends Controller
{
    public function create(){
        return view('discuss');
    }

    public function store(Request $request){

        $this->validate($request,[
            'channel_id' => 'required',
            'content' => 'required',
            'title' => 'required|unique:discussions'
        ]);

        $discussion = new Discussion();

        $discussion->channel_id = $request->input('channel_id');
        $discussion->content = $request->input('content');
        $discussion->title = $request->input('title');
        $discussion->user_id = Auth::id();
        $discussion->slug = str_slug($request->title);

        $discussion->save();

        Session::flash('success', 'Discussion created');

        return redirect()->route('discussion', [$discussion->slug]);
    }

    public function show($slug){
        $discussion = Discussion::where('slug', $slug)->first();

        $best_answer = $discussion->replies()->where('best_answer', 1)->first();

        return view('discussions.show')->with('discussion', $discussion)->with('best_answer', $best_answer);
    }

    public function reply($id){

        $this->validate(request(),[
           'reply' => 'required'
        ]);

        $discussion = Discussion::find($id);

        $reply = Reply::create([
            'user_id' => Auth::id(),
            'discussion_id' => $id,
            'content' => request()->reply
        ]);

        $reply->user->points += 15;
        $reply->user->save();

        $watchers = array();

        foreach ($discussion->watchers as $watcher):
            array_push($watchers, User::find($watcher->user_id));
        endforeach;

        Notification::send($watchers, new \App\Notifications\NewReplyAdded($discussion));

        Session::flash('success', 'Replied to discussion');

        return redirect()->back();
    }

    public function edit($slug){
        return view('discussions.edit')->with('discussion', Discussion::where('slug', $slug)->first());
    }

    public function update($id){
        $this->validate(request(),[
            'content' => 'required'
        ]);

        $discussion = Discussion::find($id);

        $discussion->content = request()->input('content');

        $discussion->save();

        Session::flash('success', 'Discussion updated');

        return redirect()->route('discussion', [$discussion->slug]);
    }

    public function search(){


        $discussions = Discussion::where('title', 'like', '%' .request('search'). '%')->get();

        return view('search')->with('discussions', $discussions);
    }
}
