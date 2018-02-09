@extends('layouts.app')

@section('content')
    <h1>Contact</h1>
    {!! Form::open(['url' => ['edit/submit', $messages->id],'method' => 'POST']) !!}
    <div class="form-group">
        {{Form::label('name', 'Name')}}
        {{Form::text('name', $messages->name, ['class' => 'form-control', 'placeholder' => 'Enter name'])}}
    </div>
    <div class="form-group">
        {{Form::label('email', 'E-Mail Address')}}
        {{Form::text('email', $messages->email, ['class' => 'form-control', 'placeholder' => 'Enter email'])}}
    </div>
    <div class="form-group">
        {{Form::label('message', 'Message')}}
        {{Form::textarea('message', $messages->message, ['id' => 'article-ckeditor','class' => 'form-control', 'placeholder' => 'Enter message'])}}
    </div>
    <div>
        {{Form::hidden('_method', 'PUT')}}
        {{Form::submit('Submit',['class' => 'btn btn-primary'])}}
    </div>
    {!! Form::close() !!}
@endsection