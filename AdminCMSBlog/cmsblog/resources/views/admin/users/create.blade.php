@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            Create a new user
        </div>

        <div class="panel-body">
            <form action="{{ route('user.store') }}" method="post">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="name">User</label>
                    <input type="text" name="name" class="form-control">
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control">
                </div>
                <div class="form-group">
                    <div class="text-center">
                        <input type="submit" class="btn btn-success" value="Add User">
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection