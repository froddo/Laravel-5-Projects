@extends('layouts.default')

@section('content')
    <h3>Upload Photo</h3>

    {!! Form::open(['action' => 'PhotosController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    {{Form::text('title', '', ['placeholder' => 'Photo Title'])}}
    {{Form::textarea('description', '', ['placeholder' => 'Photo Description'])}}
    {{Form::hidden('album_id', $album_id)}}
    {{Form::label('exampleFileUpload', 'Upload Files',['class' => 'button'])}}
    {{Form::file('photo',  ['id' => 'exampleFileUpload', 'class' => 'show-for-sr'])}}
    <div>
        {{Form::submit('Submit', ['class' => 'button secondary'])}}
    </div>

    {!! Form::close() !!}
@endsection