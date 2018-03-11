@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    You are logged in!
                    @if(Auth::user()->name == "Rumen Topalov" && Auth::user()->id == 1)
                        <h2>Messages</h2>
                        @if(count($message) > 0)
                            @foreach($message as $messages)
                                <ul class="list-group">

                                    <li class="list-group-item">
                                        <form action="{{route('delete.message',$messages->id)}}" method="post">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <button class="btn btn-sm btn-danger pull-right">Delete</button>
                                        </form>
                                        <span class="text-danger">Name:</span> {{$messages->name}}
                                    </li>
                                    <li class="list-group-item"><span class="text-danger">Email:</span> {{$messages->email}}</li>
                                    <li class="list-group-item"><span class="text-danger">Message:</span> {{$messages->message}}</li>
                                    <li class="list-group-item"><span class="text-danger">Created:</span> {{$messages->created_at}}</li>
                                </ul>
                            @endforeach
                            @else
                            <p class="alert alert-success">No message yet!</p>
                        @endif
                    @endif
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
