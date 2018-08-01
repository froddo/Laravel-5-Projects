@extends('layouts.admin')

@section('title') Editing {{ $user->name }} @endsection

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-light">
                            Editing {{ $user->name }}
                        </div>

                        @include('includes.messages.message')

                        <form action="{{ route('adminUpdateUser', $user->id) }}" method="post">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="normal-input" class="form-control-label">Name</label>
                                            <input type="text" id="normal-input" name="name" class="form-control" value="{{ $user->name }}">
                                        </div>
                                    </div>

                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="normal-input" class="form-control-label">Name</label>
                                            <input type="email" id="normal-input" name="email" class="form-control" value="{{ $user->email }}">
                                        </div>
                                    </div>

                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <p>Permissions</p>

                                            <label for="author" class="form-control-label">Author</label><br>
                                            <input type="checkbox" title="author" name="author" value=1 {{ $user->author == true ? 'checked' : '' }}><br>
                                            <label for="admin" class="form-control-label">Admin</label><br>
                                            <input type="checkbox" title="admin" name="admin"  value=1 {{ $user->admin == true ? 'checked' : '' }}>
                                        </div>
                                    </div>
                                </div>


                                <button type="submit" class="btn btn-success">Update user</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection