@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                        <a href="/posts/create" class="btn btn-primary">Create Post</a>
                        <div>
                            <p class="text-success">{{ Auth::user()->name }}
                           You are logged in!</p>
                        </div>
                    @if(count($posts) > 0)
                        <table class="table table-striped">
                            <tr>
                                <th>Title</th>
                                <th></th>
                                <th></th>
                            </tr>
                            @foreach($posts as $post)
                                <tr>
                                    <th class="text-primary"><a href="/posts/{{$post->id}}"><h4>{{$post->title}}</h4></a></th>
                                    <th><a href="/posts/{{$post->id}}/edit" class="btn btn-success">Edit Post</a></th>
                                    <th>
                                        {!! Form::open(['action' => ['PostController@destroy',$post->id],'method' => 'POST','class' => 'pull-right'])!!}
                                        {{Form::hidden('_method', 'DELETE')}}
                                        {{Form::submit('Delete Post', ['class' => 'btn btn-danger'])}}
                                        {!! Form::close() !!}
                                    </th>
                                </tr>
                            @endforeach
                        </table>
                        @else
                        <p class="text-danger">You have no posts</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
