@extends('layouts.admin')

@section('title', 'New Post')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-light">
                            New Post
                        </div>

                        @include('includes.messages.message')

                        <form action="{{ route('createPost') }}" method="post">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="normal-input" class="form-control-label">Title</label>
                                            <input id="normal-input" name="title" class="form-control" placeholder="Post title">
                                        </div>
                                    </div>

                                </div>

                                <div class="row mt-4">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="placeholder-input" class="form-control-label">Content</label>
                                            <textarea class="form-control" name="content" placeholder="Post content" id="" cols="30" rows="10"></textarea>
                                        </div>
                                    </div>

                                </div>
                                <button type="submit" class="btn btn-success">Create post</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection