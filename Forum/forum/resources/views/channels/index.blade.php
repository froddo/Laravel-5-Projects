@extends('layouts.app')

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">Channels</div>

        <div class="panel-body">
            <table class="table table-hover">
                <thead>
                    <th>Name</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </thead>

                <tbody>
                    @foreach($channels as $channel)
                        <tr>
                            <td>{{ $channel->title }}</td>
                            <td><a href="{{ route('channels.edit', [$channel->id]) }}" class="btn btn-primary btn-xs">Edit</a></td>
                            <td>
                                <form action="{{ route('channels.destroy', [$channel->id]) }}" method="post">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <input type="submit" value="Delete" class="btn btn-danger btn-xs">
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
