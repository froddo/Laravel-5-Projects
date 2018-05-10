@extends('layouts.app')

@section('content')

   @foreach($discussions as $discussion)
        <div class="panel panel-default">
            <div class="panel-heading">
                <img src="{{ $discussion->user->avatar }}" width="40px" height="40px">&nbsp;
                <span>{{ $discussion->user->name }}, <b>{{ $discussion->created_at->diffForHumans() }}</b></span>


                <a href="{{ route('discussion', [$discussion->slug]) }}" class="btn btn-default pull-right">View</a>
            </div>

            <div class="panel-body">
                <h3 class="text-center">
                    <b>{{ $discussion->title }}</b>
                </h3>
                <p class="text-center">

                    {!! Markdown::convertToHtml($discussion->content) !!}
                </p>
            </div>

            <div class="panel-footer">
                <span>
                    {{ $discussion->replies->count() }} Replies
                </span>
                <a href="{{ route('channel', [$discussion->channel->slug]) }}" class="pull-right btn btn-info btn-xs">{{ $discussion->channel->title }}</a>
                <span style="padding-left: 10px;">
                    @if($discussion->hasBestAnswer())
                        <span class="btn btn-success btn-xs">Closed</span>
                    @else
                        <span class="btn btn-danger btn-xs">Open</span>
                    @endif
                </span>

            </div>
        </div>
   @endforeach

    <div class="text-center">
        {{ $discussions->links() }}
    </div>
@endsection
