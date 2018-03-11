@extends('layouts.default')
@section('title', 'Блог')

@section('content')

<main role="main">
    <div class="jumbotron text-center">
        <div class="container">
            <h1 class="display-5">Влиянието на природата върху човешкия дух</h1>
            <hr class="my-4">
            <p class="lead">Колкото повече даваш на природата от себе си, като я съзерцаваш, боготвориш и цениш, толкова повече тя ще ти връща.</p>
            <a href="{{'/post'}}" class="btn btn-primary pull-center">
                <i class="fa fa-pencil"></i> Add Post
            </a>
        </div>
    </div>
    @if(count($post) > 0)
        @foreach($post as $posts)
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <h3><strong>{{$posts->title}}</strong></h3>
                <hr>
                <h5 class="text-dark">{{$posts->description}}</h5>
                <div class="btn-group">
                    <a href="/post/{{$posts->id}}/edit" class="btn btn-sm btn-outline-success">Edit</a>
                    <form action="{{route('delete.post',$posts->id)}}" method="post">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button class="btn btn-sm btn-outline-danger">Delete</button>
                    </form>
                </div>
                <br>
                <small class="text-right">Written on: {{$posts->created_at}}, By: <strong>Rumen Topalov</strong></small>
            </div>
        @endforeach
        @else
        <p class="alert alert-success">Няма намерен пост!</p>
    @endif
</main>
@endsection