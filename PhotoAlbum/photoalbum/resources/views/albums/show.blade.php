@extends('layouts.default')

@section('content')
    <h1>{{$album->name}}</h1>
    <div style="float: left; height: 100%" >
        <a class="button secondary" href="/">Go Back</a>
        <a class="button" href="/photos/create/{{$album->id}}">Upload Photo To Album</a>
    </div>
    <div style="margin-left: 275px;">
        {!! Form::open(['action' => ['AlbumsController@destroy', $album->id], 'method' => 'POST']) !!}
        {{Form::hidden('_method', 'DELETE')}}
        {{Form::submit('Delete Album', ['class' => 'button alert'])}}
        {!! Form::close() !!}
    </div>
    <hr>
    @if(count($album->photos) > 0)
        <?php
        $colcount = count($album->photos);
        $i = 1;
        ?>
        <div id="photos">
            <div class="row text-center">
                @foreach($album->photos as $photo)
                    @if($i == $colcount)
                        <div class='medium-4 columns end'>
                            <a class="thumbnail" href="/photos/{{$photo->id}}">
                                <img src="/storage/photos/{{$photo->album_id}}/{{$photo->photo}}" alt="{{$photo->title}}">
                            </a>
                            <br>
                            <h4>{{$photo->title}}</h4>

                            @else
                                <div class='medium-4 columns'>
                                    <a class="thumbnail" href="/photos/{{$photo->id}}">
                                        <img src="/storage/photos/{{$photo->album_id}}/{{$photo->photo}}" alt="{{$photo->title}}">
                                    </a>
                                    <br>
                                    <h4>{{$photo->title}}</h4>

                                    @endif
                                    @if($i % 3 == 0)
                                </div>
                        </div><div class="row text-center">
                            @else
                        </div>
                    @endif
                    <?php $i++; ?>
                @endforeach
            </div>
        </div>
    @else
        <p>No Photos To Display</p>
    @endif

@endsection