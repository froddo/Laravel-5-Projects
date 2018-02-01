@extends('layouts.app')
@section('title', 'Ballads')

@section('content')
    <div class="well">
        <a class="btn btn-default" href="/" role="button">Back</a>
        <h2>Create ballads album</h2>
        @include('inc.form')
    </div>
@endsection