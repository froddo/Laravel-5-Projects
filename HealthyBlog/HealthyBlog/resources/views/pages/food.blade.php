@extends('layouts.default')
@section('title', 'Здравословно')

@section('sidebar')
    <main role="main">
        <section class="jumbotron text-center">
            <div class="container">
                <h1 class="jumbotron-heading">Здравословно хранене</h1>
                <p class="lead text-muted">За здравословно хранене се смята консумацията на храни от различни групи, които да ни карат да се чувстваме добре, да имаме повече енергия, по-добро настроение и да поддържаме или подобряваме здравето си.</p>
                <a href="{{'/post'}}" class="btn btn-primary pull-center">
                    <i class="fa fa-pencil"></i> Add Post
                </a>
            </div>
        </section>
        <div class="album py-5 bg-light">
            <div class="container">
                <div class="row">
                    @if(count($post) > 0)
                        @foreach($post as $posts)
                            <div class="col-md-4">
                                <div class="card mb-4 box-shadow">
                                    <div class="card-body">
                                        <img class="card-img-top" src="/slider/img/zdravoslovno1.jpg">
                                        <h4 class="card-title text-center text-warning">{{$posts->title}}</h4>
                                        <p class="card-text"></p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="btn-group">
                                                <a class="btn btn-sm btn-outline-secondary" href="/food/{{$posts->id}}">View</a>
                                                <a href="/post/{{$posts->id}}/edit" class="btn btn-sm btn-outline-success">Edit</a>
                                                <form action="{{route('delete.post',$posts->id)}}" method="post">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <button class="btn btn-sm btn-outline-danger">Delete</button>
                                                </form>
                                            </div>
                                            <small class="text-right">Written by: <strong>Rumen Topalov</strong></small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <p>Няма намерен пост!</p>
                    @endif
                </div>
            </div>
        </div>
    </main>
@endsection