@extends('layouts.app')
@section('title', 'Music')

@section('content')
    <main role="main">
        <section class="jumbotron text-center">
            <div class="container">
                <h1 class="jumbotron-heading">Welcome to Music library</h1>
                <p class="lead text-muted">No music no life</p>
                <p>
                    <a href="/albums/discoalbum" class="btn btn-primary">View Albums Disco</a>
                    <a href="/albums/rnbalbum" class="btn btn-primary">View Albums RNB</a>
                    <a href="/albums/balladsalbum" class="btn btn-primary">View Albums Ballads</a>
                </p>
            </div>
        </section>
    </main>
    <ul class="list-group">
        <li class="list-group-item">
            <a class="btn btn-default" href="/disco">AddMusic</a>
            <span class = "badge">Disco-House</span>

        </li>
        <li class="list-group-item">
            <a class="btn btn-default" href="/rnb">AddMusic</a>
            <span class = "badge">RNB</span>

        </li>
        <li class="list-group-item">
            <a class="btn btn-default" href="/ballads">AddMusic</a>
           <span class="badge badge-secondary">Ballads</span>

        </li>
    </ul>
@endsection


