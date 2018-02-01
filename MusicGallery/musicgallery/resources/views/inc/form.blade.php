@if(Request::is('disco'))
{!! Form::open(['action' => 'PostController@createDisco', 'method' => 'POST', 'enctype' =>'multipart/form-data']) !!}
<div class="form-group">
    {{Form::label('album_title', 'Title')}}
    {{Form::text('album_title', '',['class' => 'form-control', 'placeholder' =>'Album name'])}}
</div>
<div class="form-group">
    {{Form::file('disco')}}
</div>
<div class="form-group">
    {{form::submit('Submit',['class' => 'btn btn-primary'])}}
</div>

{!! Form::close() !!}
@endif

@if(Request::is('rnb'))
    {!! Form::open(['action' => 'PostController@createRnb', 'method' => 'POST', 'enctype' =>'multipart/form-data']) !!}
    <div class="form-group">
        {{Form::label('album_title', 'Title')}}
        {{Form::text('album_title', '',['class' => 'form-control', 'placeholder' =>'Album name'])}}
    </div>
    <div class="form-group">
        {{Form::file('rnb')}}
    </div>
    <div class="form-group">
        {{form::submit('Submit',['class' => 'btn btn-primary'])}}
    </div>

    {!! Form::close() !!}
@endif

@if(Request::is('ballads'))
    {!! Form::open(['action' => 'PostController@createBallads', 'method' => 'POST', 'enctype' =>'multipart/form-data']) !!}
    <div class="form-group">
        {{Form::label('album_title', 'Title')}}
        {{Form::text('album_title', '',['class' => 'form-control', 'placeholder' =>'Album name'])}}
    </div>
    <div class="form-group">
        {{Form::file('ballads')}}
    </div>
    <div class="form-group">
        {{form::submit('Submit',['class' => 'btn btn-primary'])}}
    </div>

    {!! Form::close() !!}
@endif


