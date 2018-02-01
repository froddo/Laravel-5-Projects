@extends('layouts.app')
@section('title', 'RNB')

@section('content')
    <div class="well">
        <a class="btn btn-default" href="/" role="button">Back</a>
        <h2>Create rnb album</h2>
        @include('inc.form')
    </div>
@endsection