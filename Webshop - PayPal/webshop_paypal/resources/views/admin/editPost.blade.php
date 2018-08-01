@extends('layouts.admin')

@section('title') Editing {{ $post->title }} @endsection

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-light">
                            Editing {{ $post->title }}
                        </div>

                        @include('includes.messages.message')

                        <form action="{{ route('adminPostUpdate', $post->id) }}" method="post">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="normal-input" class="form-control-label">Title</label>
                                            <input id="normal-input" name="title" class="form-control" value="{{ $post->title }}">
                                        </div>
                                    </div>

                                </div>

                                <div class="row mt-4">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="placeholder-input" class="form-control-label">Content</label>
                                            <textarea class="form-control" name="content" id="" cols="30" rows="10">{{ $post->content }}</textarea>
                                        </div>
                                    </div>

                                </div>
                                <button type="submit" class="btn btn-success">Update post</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection