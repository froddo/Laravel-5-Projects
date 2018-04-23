@extends('layouts.app')

@section('content')

    <div class="col-lg-3">
        <div class="panel panel-info">
            <div class="panel-heading text-center">
               ALL POSTS
            </div>
            <div class="panel-body text-center">
                <h3>{{ $post_count }}</h3>
            </div>
        </div>
    </div>

    <div class="col-lg-3">
        <div class="panel panel-warning">
            <div class="panel-heading text-center">
               ALL USERS
            </div>
            <div class="panel-body text-center">
                <h3>{{ $user_count }}</h3>
            </div>
        </div>
    </div>

    <div class="col-lg-3">
        <div class="panel panel-success">
            <div class="panel-heading text-center">
               ALL CATEGORIES
            </div>
            <div class="panel-body text-center">
                <h3>{{ $category_count }}</h3>
            </div>
        </div>
    </div>

    <div class="col-lg-3">
        <div class="panel panel-primary">
            <div class="panel-heading text-center">
                ALL TAGS
            </div>
            <div class="panel-body text-center">
                <h3>{{ $tag_count }}</h3>
            </div>
        </div>
    </div>

    <div class="col-lg-3">
        <div class="panel panel-danger">
            <div class="panel-heading text-center">
                TRASHED POSTS
            </div>
            <div class="panel-body text-center">
                <h3>{{ $trash_count }}</h3>
            </div>
        </div>
    </div>
@endsection
