@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @include('inc.messages')
                    @if(Auth::id() == 1 && Auth::user()->created_at == "2018-02-14 19:47:02")
                        <a style="margin-left: 5px;" class="btn btn-primary pull-right" href="/message">Messages</a>
                    @endif
                        <a href="/market/show" class="btn btn-success pull-right">Go To Market</a>
                        <p>{{Auth::user()->name}}, You are logged in!</p>
                        <hr>
                    @if(count($payment) > 0)
                        <div >
                            @foreach($payment as $payments)
                            <div class="well">
                                <a href="/storage/photos/{{$payments->photo}}" download="/storage/photos/{{$payments->photo}}">
                                    <button class="myButton pull-right"><span class="glyphicon glyphicon-download"></span> Download</button>
                                </a>
                                <h3 class="text-warning">{{$payments->title}}</h3>
                                <img class="grid-container-one" src="/storage/photos/{{$payments->photo}}" alt="{{$payments->title}}">
                                <br>

                                    <button data-id="{{$payments->id}}" class="delete-photo btn btn-danger pull-right" ><span class="glyphicon glyphicon-remove"></span> Delete</button>

                                <p>{{$payments->description}}</p>
                                <p>Written on {{$payments->created_at}}</p>
                                <p>By {{Auth::user()->name}}</p>
                            </div>
                            @endforeach
                        </div>
                        @else
                        <p class="text-danger">You have nothing bought!</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
