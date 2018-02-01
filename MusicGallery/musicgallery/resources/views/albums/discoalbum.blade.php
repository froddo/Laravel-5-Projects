@extends('layouts.app')
@section('title', 'DiscoAlbum')

@section('content')
    <div class="well">
        <a class="btn btn-default" href="/" role="button">Back</a>
        <a class="btn btn-default" href="/disco">AddMusic</a>
        <div class="pull-right"><a class="btn btn-success" href="/home">{{Auth::user()->name}} Dashboard</a></div>

        <h2>View disco album</h2>
    </div>
        @if(count($disco) > 0)
            @foreach($disco as $discos)
                <div class="well">
                    <div class="row">
                        <div class="col-md-4 col-sm-4">
                           <h3>{{$discos->album_title}}</h3><br>
                            {{$discos->disco}}
                            <audio controls>
                                <source src="/storage/disco/{{$discos->disco}}" type="audio/mpeg">
                            </audio>

                            @if(Auth::user()->id == $discos->user_id)
                            {!! Form::open(['action' => ['PostController@destroyDisco', $discos->id], 'method' => 'POST'])!!}
                                {{Form::hidden('_method', 'DELETE')}}
                                {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                            {!! Form::close() !!}
                            @endif

                            <br>
                            <p>Written on {{$discos->created_at}}</p>
                            <p>by {{$discos->user->name}}</p>
                        </div>
                    </div>
                </div>
            @endforeach
            {{$disco->links()}}
        @else
            <p class="alert alert-success">No music found</p>
        @endif
@endsection
