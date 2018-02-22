@extends('layouts.app')

@section('content')
    <a class="btn btn-primary pull-right" href="/home">Dashboard</a>
    <h1 class="text-warning">Messages</h1>

    @if(Auth::id() == 1 && Auth::user()->created_at == "2018-02-14 19:47:02")
        @foreach($message as $messages)
            <ul class="list-group">
                <li class="list-group-item"><span class="text-danger">Name: </span>{{$messages->name}}</li>
                <li class="list-group-item"><span class="text-danger">Email: </span>{{$messages->email}}</li>
                <li class="list-group-item"><span class="text-danger">Subject: </span>{{$messages->subject}}</li>
                <li class="list-group-item"><span class="text-danger">Description: </span>{{$messages->description}}</li>
            </ul>
        @endforeach
    @else
        <p class="text-danger text-uppercase">Only Admin!</p>
    @endif

@endsection