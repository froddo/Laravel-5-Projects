@extends('layouts.app')
@section('content')
<h1>Todos</h1>
<div>
    <button type="button" class="btn btn-primary">
        TodoList <span class="badge badge-light">{{$todoss}}</span>
    </button>
</div>
<br>
@if(count($todos) > 0)
    @foreach($todos as $todo)
        <div class="well">
            <h3><a href="todo/{{$todo->id}}">{{$todo->text}}</a></h3>
            <span class="label label-danger">{{$todo->due}}</span>
        </div>
    @endforeach
@endif
@endsection