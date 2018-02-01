@extends('layouts.app')
@section('title', 'RnbAlbum')

@section('content')
    <div class="well">
        <a class="btn btn-default" href="/" role="button">Back</a>
        <a class="btn btn-default" href="/rnb">AddMusic</a>
        <div class="pull-right"><a class="btn btn-success" href="/home">{{Auth::user()->name}} Dashboard</a></div>
        <h2>View rnb album</h2>
    </div>
    @if(count($rnb) > 0)
        @foreach($rnb as $rnbs)
            <div class="well">
                <div class="row">
                    <div class="col-md-4 col-sm-4">
                        <h3>{{$rnbs->album_title}}</h3><br>
                        {{$rnbs->rnb}}
                        <audio controls>
                            <source src="/storage/rnb/{{$rnbs->rnb}}" type="audio/mpeg">
                        </audio>
                        @if(Auth::user()->id == $rnbs->user_id)
                        {!! Form::open(['action' => ['PostController@destroyRnb', $rnbs->id], 'method' => 'POST']) !!}
                            {{Form::hidden('_method', 'DELETE')}}
                            {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                        {!! Form::close() !!}
                        @endif

                        <br>
                        <p>Written on {{$rnbs->created_at}}</p>
                        <p>by {{$rnbs->user->name}}</p>
                    </div>
                </div>
            </div>
        @endforeach
        {{$rnb->links()}}
    @else
        <p class="alert alert-success">No music found</p>
    @endif

@endsection