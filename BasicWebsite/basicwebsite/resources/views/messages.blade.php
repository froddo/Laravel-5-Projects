@extends('layouts.app')

@section('content')
    <h1>Messages</h1>
    @if(count($messages) > 0)
        @foreach($messages as $message)

            <ul class="list-group">
                @if(Auth::user()->id == $message->user_id)
                    <li class="list-group-item">Name: {{$message->name}}  <a style="margin-left: 1em" class="pull-right btn btn-success btn-sm" href="/messages/edit/{{$message->id}}">Edit</a>&nbsp;

                        {!! Form::open(['url' => ['message/delete', $message->id],'method' => 'POST', 'class' => 'pull-right']) !!}
                            {{Form::hidden('_method', 'DELETE')}}
                            {{Form::submit('Delete',['class' => 'btn btn-danger btn-sm'])}}
                        {!! Form::close() !!}
                    </li>
                @else
                    <li class="list-group-item">Name: {{$message->name}} </li>
                @endif
                    <li class="list-group-item">Email: {{$message->email}} </li>
                    <li class="list-group-item">Message: {!! $message->message !!}</li>
            </ul>

        @endforeach
    @else
        <p class="text-danger">No massage yet!</p>
    @endif
@endsection

@section('sidebar')
    @parent
    <p>This is appended to the sidebar</p>
@endsection
