@extends('layouts.default')

@section('content')

        <div style="float: left; height: 100%">
            <a class="button" href="/albums/{{$photo->album_id}}">Back To Gallery</a>
        </div>
        <div style="margin-left: 135px;">
            {!! Form::open(['action' => ['PhotosController@destroy', $photo->id], 'method' => 'POST']) !!}
            {{Form::hidden('_method', 'DELETE')}}
            {{Form::submit('Delete Photo', ['class' => 'button alert'])}}
            {!! Form::close() !!}
        </div>
    <div class="polaroid"><p>{{$photo->description}}</p></div>
    <hr>
    <div class="polaroid">
        <h3>{{$photo->title}}</h3>
       <div class="morph">
           <img class="imgBox" src="/storage/photos/{{$photo->album_id}}/{{$photo->photo}}" alt="{{$photo->title}}">
       </div>
    </div>
    <br><br>
@endsection