@extends('layouts.app')
@section('title','Posts')

@section('content')
    <a href="/posts" class="btn btn-primary">Go Back</a>
    <h1>{{$post->title}}</h1>

        <div class="jumbotron jumbotron-fluid">
            <div class="row">
                <div class="col-md-4 col-sm-4">
                     <img style="width: 50%" src="/storage/cover_image/{{$post->cover_image}}">
                </div>
                <div class="col-md-8 col-sm-8">
                    {!!$post->body!!}
                </div>
            </div>

        </div>
    <br>
    <smal>Written on {{$post->created_at}} by {{$post->user->name}}</smal><br>
    @if(!Auth::guest())
        @if(Auth::user()->id == $post->user_id)
            <a href="/posts/{{$post->id}}/edit" class="btn btn-success">Edit Post</a>

            {!! Form::open(['action' => ['PostController@destroy',$post->id],'method' => 'POST','class' => 'pull-right'])!!}
            {{Form::hidden('_method', 'DELETE')}}
            {{Form::submit('Delete Post', ['class' => 'btn btn-danger'])}}
            {!! Form::close() !!}
        @endif
    @endif
@endsection