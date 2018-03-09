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
                    @if(Auth::user()->id == 1 && Auth::user()->email == "rumen6611@abv.bg")
                    <hr>
                        @if(count($message) > 0)
                            @foreach($message as $messages)
                                <ul class="list-group">
                                    <li class="list-group-item text-warning">Name: {{$messages->name}}</li>
                                    <li class="list-group-item text-warning">Email: {{$messages->email}}</li>
                                    <li class="list-group-item text-warning">Messages: {{$messages->message}}</li>
                                    <li class="list-group-item text-warning">Created: {{$messages->created_at}}</li>
                                </ul>
                            @endforeach
                        @else
                            <p>No message found</p>
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
