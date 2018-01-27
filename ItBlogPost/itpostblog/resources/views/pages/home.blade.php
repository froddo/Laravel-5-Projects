@extends('layouts.app')
@section('title','Home')

@section('content')
    <div class="jumbotron text-center">
        <h1>Welcome to PHP blog</h1>
        <p>Object-oriented PHP and MVC</p>
    </div>
    <div class="container">
        <!-- Example row of columns -->
        <div class="row">
            @if(count($post) > 0)
                @foreach($post as $pos)
                        <div class="col-md-4">
                            <h2>{{$pos->title}}</h2>
                            <p><a class="btn btn-primary" href="posts/{{$pos->id}}" role="button">View details &raquo;</a></p>
                        </div>
                @endforeach
            @else
                <p>No Post Found</p>
            @endif
        </div>
    </div>

@endsection
