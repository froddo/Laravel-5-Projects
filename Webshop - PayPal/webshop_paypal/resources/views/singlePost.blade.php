@extends('layouts.master')

@section('content')
<!-- Page Header -->
<header class="masthead" style="background-image: url('{{asset('assets/img/post-bg.jpg')}}')">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="post-heading">
                    <h1>{{ $post->title }}</h1>

                    <span class="meta">Posted by
                <a href="#">{{ $post->user->name }}</a>
                on {{ date_format($post->created_at, 'F d, Y') }}</span>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Post Content -->
<article>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                {!! nl2br($post->content) !!}
            </div>
        </div>
        <div class="comments">
            <hr>
            <h2>Comments</h2>
            <hr>
            @foreach($post->comments as $comment)
                <p>{{ $comment->content }}</p>
                <p><small>by {{ $comment->user->name }}, on {{ date_format($comment->created_at, 'F d, Y') }}</small></p>
                <hr>
            @endforeach
            @include('includes.messages.message')
            @if(Auth::check())
                <form method="post" action="{{ route('newComment') }}">
                    @csrf
                    <div class="form-group">
                        <textarea class="form-control" name="comment" placeholder="Comment..." id="" cols="30" rows="4"></textarea>
                        <input type="hidden" name="post_id" value="{{ $post->id }}">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">Make Comment</button>
                    </div>
                </form>
            @endif
        </div>
    </div>
</article>



@endsection