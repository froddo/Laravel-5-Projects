@extends('layouts.default')
@section('title', 'Edit')

@section('content')
    <a href="{{'/'}}" class="btn btn-light"><i class="fa fa-backward"></i> Back</a>
    <div class="card card-body bg-light mt-5">
        <h2>Add Post</h2>
        <p>Create post with this form</p>
        <form action="{{route('update.post',$post->id)}}" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group">
                <label for="title">Subject: <sup>*</sup></label>
                <input type="text" name="subject" class="form-control form-control-lg" value="{{$post->subject}}">
            </div>

            <div class="form-group">
                <label for="title">Title: <sup>*</sup></label>
                <input type="text" name="title" class="form-control form-control-lg" value="{{$post->title}}">
            </div>

            <div class="form-group">
                <label for="body">Description: <sup>*</sup></label>
                <textarea name="description" class="form-control form-control-lg">{{$post->description}}</textarea>

            </div>
            <input type="submit" class="btn btn-success" value="Submit">
        </form>
    </div>
@endsection