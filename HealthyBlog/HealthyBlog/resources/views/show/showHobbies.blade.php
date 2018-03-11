@extends('layouts.default')
@section('title', 'Хоби')

@section('sidebar')
    <div class="album py-5 bg-light">
        <div class="container">

            <div class="row">
                @if(count($post) > 0)

                    <div class="col-md-8">
                        <div class="card mb-4 box-shadow">
                            <div class="card-body">
                                <img class="card-img-top" src="/slider/img/tea.jpg">
                                <h4 class="card-title text-center text-info">{{$post->title}}</h4>
                                <p class="card-text">{{$post->description}}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a class="btn btn-sm btn-outline-secondary" href="/hobbies">Go Back</a>
                                        <a href="/post/{{$post->id}}/edit" class="btn btn-sm btn-outline-success">Edit</a>
                                        <form action="{{route('delete.post',$post->id)}}" method="post">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <button class="btn btn-sm btn-outline-danger">Delete</button>
                                        </form>
                                    </div>
                                    <small class="text-right">Written on: {{$post->created_at}}, By: <strong>Rumen Topalov</strong></small>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <p>Няма намерен пост!</p>
                @endif
            </div>

        </div>
    </div>
@endsection