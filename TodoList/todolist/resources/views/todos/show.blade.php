@extends('layouts.app')

@section('content')
    <a class="btn btn-default" href="/">Go Back</a>
    <h1>{{$todo->text}}</h1>
    <div class="label label-danger">{{$todo->due}}</div>
    <hr>
    <p>
        <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
            View {{$todo->text}}
        </button>
    </p>
    <div class="collapse" id="collapseExample">
        <div class="card card-body">
            <p class="well">{{$todo->body}}</p>
        </div>
    </div>
    <br><br>
    <a href="/todo/{{$todo->id}}/edit" class="btn btn-default">Edit</a>
    {!! Form::open(['action' =>['TodosController@destroy', $todo->id], 'method' => 'POST', 'class' => 'pull-right']) !!}
        {{Form::hidden('_method', 'DELETE')}}
        {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
    {!! Form::close() !!}
@endsection