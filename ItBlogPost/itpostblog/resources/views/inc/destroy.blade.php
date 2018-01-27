{!! Form::open(['action' => ['PostController@destroy',$post->id],'method' => 'POST'])!!}
{{Form::hidden('_method', 'DELETE')}}
{{Form::submit('Delete Post', ['class' => 'btn btn-danger'])}}
{!! Form::close() !!}