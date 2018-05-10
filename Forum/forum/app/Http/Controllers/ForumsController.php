<?php

namespace App\Http\Controllers;

use App\Channel;
use App\Discussion;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Pagination\Paginator;

class ForumsController extends Controller
{
    public function index(){

        // $discussions = Discussion::orderBy('created_at', 'desc')->paginate(3);
        switch (request('filter')){
            case 'me':
                $results = Discussion::where('user_id', Auth::id())->paginate(30);

                break;
            case 'solved':
                $answered = array();
                foreach (Discussion::all() as $discussion){
                    if ($discussion->hasBestAnswer()){
                        array_push($answered, $discussion);
                    }
                }

                $results = new Paginator($answered,30);

                break;

            case 'unsolved':
                $unanswered = array();
                foreach (Discussion::all() as $discussion){
                    if (!$discussion->hasBestAnswer()){
                        array_push($unanswered, $discussion);
                    }
                }

                $results = new Paginator($unanswered,30);

                break;

            default:
                $results = Discussion::orderBy('created_at', 'desc')->paginate(3);
                break;
        }

        return view('forum')->with('discussions', $results);
    }

    public function channel($slug){
        $channel = Channel::where('slug', $slug)->first();

        return view('channel')->with('discussions', $channel->discussions()->paginate(5));
    }
}
