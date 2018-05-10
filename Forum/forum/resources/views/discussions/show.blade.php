@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <img src="{{ $discussion->user->avatar }}" width="40px" height="40px">&nbsp;
            <span>{{ $discussion->user->name }}, <b>( {{ $discussion->user->points }} )</b></span>
            @if(Auth::id() == $discussion->user->id)
                <a href="{{ route('discussion.edit', [$discussion->slug]) }}" class="btn btn-primary btn-xs pull-right">Edit</a>
            @endif
            @if($discussion->is_being_watched_by_auth_user())
                <a href="{{ route('discussion.unwatch', [$discussion->id]) }}" class="btn btn-default btn-xs pull-right" style="margin-right: 8px;">Unwatch</a>
            @else
                <a href="{{ route('discussion.watch', [$discussion->id]) }}" class="btn btn-default btn-xs pull-right" style="margin-right: 8px;">Watch</a>
            @endif
        </div>

        <div class="panel-body">
            <h3 class="text-center">
                <b>{{ $discussion->title }}</b>
            </h3>
            <hr>
            <p class="text-center">
              {!! Markdown::convertToHtml($discussion->content) !!}
            </p>
            <hr>

            @if($best_answer)
                <div class="text-center" style="padding: 40px;">
                    <h3 class="text-center">Best Answer</h3>
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <img src="{{ $best_answer->user->avatar }}" width="40px" height="40px">&nbsp;
                            <span>{{ $best_answer->user->name }}, <b>( {{ $best_answer->user->points }} )</b></span>
                        </div>

                        <div class="panel-body">
                            {!! Markdown::convertToHtml($best_answer->content) !!}
                        </div>
                    </div>
                </div>
            @endif

        </div>

        <div class="panel-footer">
            <span>
                {{ $discussion->replies->count() }} Replies
            </span>
            <a href="{{ route('channel', [$discussion->channel->slug]) }}" class="pull-right btn btn-info btn-xs">{{ $discussion->channel->title }}</a>
        </div>
    </div>


    @foreach($discussion->replies as $reply)
        <div class="panel panel-default">
            <div class="panel-heading">
                <img src="{{ $reply->user->avatar }}" width="40px" height="40px">&nbsp;
                <span>{{ $reply->user->name }}, <b>( {{ $reply->user->points }} )</b></span>
                @if(!$best_answer)
                    @if(Auth::id() != $reply->user->id)
                        <a href="{{ route('discussion.best.answer', [$reply->id]) }}" class="btn btn-success btn-xs pull-right">Mark as a best answer</a>
                    @endif
                @endif
            </div>

            <div class="panel-body">
                <p class="text-center">
                    {!! Markdown::convertToHtml($reply->content) !!}
                </p>
            </div>

            <div class="panel-footer">
                @if($reply->is_liked_by_auth_user())
                    <a href="{{ route('reply.unlike', [$reply->id]) }}" class="btn btn-danger btn-xs">Unlike <span class="badge">{{ $reply->likes->count() }}</span></a>
                @else
                    <a href="{{ route('reply.like', [$reply->id]) }}" class="btn btn-success btn-xs">Like <span class="badge">{{ $reply->likes->count() }}</span></a>
                @endif

                    @if(Auth::id() == $reply->user->id)

                        <form action="{{ route('reply.delete', [$reply->id]) }}" method="post" class="pull-right" style="margin-left: 8px;">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <input type="submit" value="Delete" class="btn btn-danger btn-xs">
                        </form>

                        <a href="{{ route('reply.edit', [$reply->id]) }}" class="btn btn-primary btn-xs pull-right" style="margin-top: 1px;">Edit</a>

                    @endif
            </div>
        </div>
    @endforeach


    <div class="panel panel-default">
        <div class="panel-body">
            @if(Auth::check())
            <form action="{{ route('discussion.reply', [$discussion->id]) }}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="reply">Leave a reply...</label>
                    <textarea name="reply" id="reply" cols="30" rows="10" class="form-control"></textarea>
                </div>

                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-success pull-right">Leave a reply</button>
                    </div>
                </div>
            </form>
            @else
                <div class="text-center">
                    <h2>Sign in to leave a reply</h2>
                </div>
            @endif
        </div>
    </div>
@endsection
