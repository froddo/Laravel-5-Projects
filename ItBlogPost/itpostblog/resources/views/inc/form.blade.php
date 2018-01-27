{!! Form::open(['action' => 'PostController@store', 'method' =>'POST','enctype' => 'multipart/form-data']) !!}
    <div class="form-group">
        {{Form::label('title', 'Title')}}
        {{Form::text('title','',['class' => 'form-control', 'placeholder' => 'Title'])}}
      </div>
    <div class="form-group">
        {{Form::label('body', 'Body')}}
        {{Form::textarea('body', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Body text'])}}
    </div>
    <div class="form-group">
        {{Form::file('cover_image')}}
    </div>
        {{form::submit('Submit',['class' => 'btn btn-primary'])}}
{!! Form::close() !!}