@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            All categories
        </div>
        <div class="panel-body">
            <table class="table table-hover">

                <thead>
                    <th>Category name</th>
                    <th>Edit category</th>
                    <th>Delete category</th>
                </thead>

                <tbody>
                @if($categories->count() > 0)

                    @foreach($categories as $category)
                        <tr>
                            <td>{{$category->name}}</td>
                            <td><a href="{{ route('category.edit',[$category->id]) }}"  class="btn btn-primary btn-xs"><i class="fas fa-pencil-alt"></i> Edit</a></td>
                            <td>
                                <form action="{{ route('category.destroy',[$category->id]) }}" method="post">
                                    {{csrf_field()}}
                                    {{ method_field('DELETE') }}
                                    <button type="submit" class="btn btn-danger btn-xs "><i class="fas fa-ban"></i> Delete</button>
                                </form>
                            </td>

                        </tr>

                    @endforeach
                @else
                    <tr>
                        <th colspan="5" class="text-center">No category found</th>
                    </tr>

                @endif

                </tbody>
            </table>
        </div>
    </div>
@endsection