@extends('layouts.app')
@section('title', 'BalladsAlbum')

@section('content')
    <div class="well">
        <a class="btn btn-default" href="/" role="button">Back</a>
        <a class="btn btn-default" href="/ballads">AddMusic</a>
        <div class="pull-right"><a class="btn btn-success" href="/home">{{Auth::user()->name}} Dashboard</a></div>
        <h2>View ballads album</h2>
    </div>
    @if(count($ballad) > 0)
        @foreach($ballad as $ballads)
            <div class="well">
                <div class="row">
                    <div class="col-md-4 col-sm-4">
                        <h3>{{$ballads->album_title}}</h3><br>
                        {{$ballads->ballads}}
                        <audio controls>
                            <source src="/storage/ballads/{{$ballads->ballads}}" type="audio/mpeg">
                        </audio>
                        @if(Auth::user()->id == $ballads->user_id)
                        {!! Form::open(['action' => ['PostController@destroyBallad', $ballads->id], 'method' => 'POST']) !!}
                        {{Form::hidden('_method', 'DELETE')}}
                        {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                        {!! Form::close() !!}
                        @endif

                        <br>
                        <p>Written on {{$ballads->created_at}}</p>
                        <p>by {{$ballads->user->name}}</p>
                    </div>
                </div>
            </div>
        @endforeach
        {{$ballad->links()}}
    @else
        <p class="alert alert-success">No music found</p>
    @endif
@endsection