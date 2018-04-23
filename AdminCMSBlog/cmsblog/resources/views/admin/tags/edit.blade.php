@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            Update tag {{$tag->tag}}
        </div>

        <div class="panel-body">
            <form action="{{ route('tag.update',[$tag->id]) }}" method="post">
                {{csrf_field()}}
                {{ method_field('PUT') }}
                <div class="form-group">
                    <label for="tag">Tag</label>
                    <input type="text" name="tag" class="form-control" value="{{ $tag->tag }}">
                </div>
                <div class="form-group">
                    <div class="text-center">
                        <input type="submit" class="btn btn-success" value="Update Tag">
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection