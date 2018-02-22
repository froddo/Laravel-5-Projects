@extends('layouts.default')

@section('title', 'PhotoShow')

@section('content')
    <a href="/market/show" class="myButton">Back To Photos</a>
   <h1>{{$photo->description}}</h1>
    <hr>
   <br>

    <div class="grid-photo">
        <div>
            <a id="go1" href="#">
                <img id="size" src="/storage/photos/{{$photo->photo}}" alt="{{$photo->title}}" width="99%">
            </a>
            <a id="go" href="#">

                <img id="first" src="/storage/photos/{{$photo->photo}}" alt="{{$photo->title}}" width="80%">
            </a>
            <br>
            <p id="mouse"></p>
            <h4>{{$photo->title}}  <a class="price" href="/payment/{{$photo->id}}">Buy/1$</a></h4>
        </div>
    </div>
@endsection