@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            Trashed posts
        </div>
        <div class="panel-body">
            <table class="table table-hover">

                <thead>
                <th>Image</th>
                <th>Title</th>
                <th>Restore</th>
                <th>Destroy</th>
                </thead>

                <tbody>
                @if($posts->count() > 0)

                    @foreach($posts as $post)
                        <tr>
                            <td><img src="{{ $post->featured }}" width="90px"></td>
                            <td>{{ $post->title }}</td>

                            <td>
                                <a href="{{ route('posts.restore',[$post->id]) }}" class="btn btn-success btn-xs "><i class="fas fa-window-restore"></i> Restore</a>
                            </td>
                            <td>
                                <form action="{{ route('posts.kill',[$post->id]) }}" method="post">
                                    {{csrf_field()}}
                                    {{ method_field('DELETE') }}
                                    <button type="submit" class="btn btn-danger btn-xs "><i class="fas fa-ban"></i> Destroy</button>
                                </form>
                            </td>
                        </tr>

                    @endforeach

                    @else
                    <tr>
                        <th colspan="5" class="text-center">No trashed posts</th>
                    </tr>

                @endif

                </tbody>
            </table>
        </div>
    </div>
@endsection