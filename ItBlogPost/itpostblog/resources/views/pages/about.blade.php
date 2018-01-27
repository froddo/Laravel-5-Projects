@extends('layouts.app')
@section('title', 'About')

@section('content')

    <div class="content-article">
        <h1>This is about</h1>
    </div>
    <div class="col-md-4">
        <div class="span4 collapse-group">
            <h2>Laravel Horizon</h2>
            <p class="collapse" id="viewdetails">Laravel Horizon provides a beautiful dashboard and code-driven configuration for your Redis queues.</p>
            <p><a class="btn btn-primary" data-toggle="collapse" data-target="#viewdetails">View details &raquo;</a></p>
        </div>
    </div>
    <div class="col-md-4">
        <div class="span4 collapse-group">
            <h2>Laravel Dusk</h2>
            <p class="collapse" id="viewdetails2">Laravel Dusk provides an expressive, easy-to-use browser automation and testing API. You'll love it.</p>
            <p><a class="btn btn-primary" data-toggle="collapse" data-target="#viewdetails2">View details &raquo;</a></p>
        </div>
    </div>
    <div class="col-md-4">
        <div class="span4 collapse-group">
            <h2>Laravel Echo</h2>
            <p class="collapse" id="viewdetails3">Event broadcasting, evolved. Bring the power of WebSockets to your application without the complexity.</p>
            <p><a class="btn btn-primary" data-toggle="collapse" data-target="#viewdetails3">View details &raquo;</a></p>
        </div>
    </div>

@endsection()