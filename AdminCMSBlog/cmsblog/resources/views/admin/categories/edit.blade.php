@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            Update category {{$category->name}}
        </div>

        <div class="panel-body">
            <form action="{{ route('category.update',[$category->id]) }}" method="post">
                {{csrf_field()}}
                {{ method_field('PUT') }}
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" value="{{ $category->name }}">
                </div>
                <div class="form-group">
                    <div class="text-center">
                        <input type="submit" class="btn btn-success" value="Update Category">
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection