@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            All tags
        </div>
        <div class="panel-body">
            <table class="table table-hover">

                <thead>
                <th>Tag name</th>
                <th>Edit tag</th>
                <th>Delete tag</th>
                </thead>

                <tbody>
                @if($tags->count() > 0)

                    @foreach($tags as $tag)
                        <tr>
                            <td>{{$tag->tag}}</td>
                            <td><a href="{{ route('tag.edit',[$tag->id]) }}"  class="btn btn-primary btn-xs"><i class="fas fa-pencil-alt"></i> Edit</a></td>
                            <td>
                                <form action="{{ route('tag.destroy',[$tag->id]) }}" method="post">
                                    {{csrf_field()}}
                                    {{ method_field('DELETE') }}
                                    <button type="submit" class="btn btn-danger btn-xs "><i class="fas fa-ban"></i> Delete</button>
                                </form>
                            </td>

                        </tr>

                    @endforeach
                @else
                    <tr>
                        <th colspan="5" class="text-center">No tags found</th>
                    </tr>

                @endif

                </tbody>
            </table>
        </div>
    </div>
@endsection