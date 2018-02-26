@extends('layouts.default')

@section('content')
    <h3>Create Album</h3>

    {!! Form::open(['action' => 'AlbumsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        {{Form::text('name', '', ['placeholder' => 'Album Name'])}}
        {{Form::textarea('description', '', ['placeholder' => 'Album Description'])}}
        {{Form::label('exampleFileUpload', 'Upload Files',['class' => 'button'])}}
        {{Form::file('cover_image',  ['id' => 'exampleFileUpload', 'class' => 'show-for-sr'])}}
        <div>
            {{Form::submit('Submit', ['class' => 'button secondary'])}}
        </div>
    {!! Form::close() !!}
@endsection