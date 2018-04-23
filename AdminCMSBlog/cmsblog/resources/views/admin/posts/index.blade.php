@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            All posts
        </div>
        <div class="panel-body">
            <table class="table table-hover">

                <thead>
                <th>Image</th>
                <th>Title</th>
                <th>Edit</th>
                <th>Trash</th>
                </thead>

                <tbody>
                @if($posts->count() > 0)
                    @foreach($posts as $post)
                        <tr>
                            <td><img src="{{$post->featured}}" width="90" height="50"></td>
                            <td>{{ $post->title }}</td>
                            <td><a href="{{ route('post.edit',[$post->id]) }}"  class="btn btn-primary btn-xs"><i class="fas fa-pencil-alt"></i> Edit</a></td>
                            <td>
                                <form action="{{ route('post.destroy',[$post->id]) }}" method="post">
                                    {{csrf_field()}}
                                    {{ method_field('DELETE') }}
                                    <button type="submit" class="btn btn-danger btn-xs "><i class="fas fa-trash-alt"></i> Trash</button>
                                </form>
                            </td>
                        </tr>

                    @endforeach
                    @else
                    <tr>
                        <th colspan="5" class="text-center">No posts found</th>
                    </tr>

                @endif

                </tbody>
            </table>
        </div>
    </div>
@endsection