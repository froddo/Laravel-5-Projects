@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            Users
        </div>
        <div class="panel-body">
            <table class="table table-hover">

                <thead>
                <th>Image</th>
                <th>Name</th>
                <th>Permissions</th>
                <th>Delete</th>
                </thead>

                <tbody>
                @if($users->count() > 0)

                    @foreach($users as $user)
                        <tr>
                            <td>
                                <img src="{{ asset($user->profile->avatar) }}" width="60px" height="60px" style="border-radius: 50%;">

                            </td>
                            <td>
                                {{ $user->name }}

                            </td>
                            <td>
                                @if($user->admin)
                                    <a href="{{ route('users-not.admin', [$user->id]) }}" class="btn btn-danger btn-xs">Make Not Admin</a>

                                @else
                                    <a href="{{ route('users.admin', [$user->id]) }}" class="btn btn-success btn-xs">Make Admin</a>
                                @endif
                            </td>
                            <td>
                                @if(Auth::id() !== $user->id)
                                <form action="{{ route('user.destroy',[$user->id]) }}" method="post">
                                    {{csrf_field()}}
                                    {{ method_field('DELETE') }}
                                    <button type="submit" class="btn btn-danger btn-xs "><i class="fas fa-trash-alt"></i> Delete</button>
                                </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach

                @else
                    <tr>
                        <th colspan="5" class="text-center">No users found</th>
                    </tr>

                @endif

                </tbody>
            </table>
        </div>
    </div>
@endsection