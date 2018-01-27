@extends('layouts.app')
@section('title','Create Posts')
@section('content')
    <h1>Create Post</h1>

    @if(Auth::user())
        @include('inc.form')
    @else
        <div class="alert alert-danger">
            {{ session('status','Only registered users can write posts') }}
        </div>
    @endif


@endsection