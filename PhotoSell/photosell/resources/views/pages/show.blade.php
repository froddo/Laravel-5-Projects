@extends('layouts.default')

@section('title','Market')

@section('content')
    <div class="top-box top-box-a">
    <a class="btnDark" href="/market">Add Photo</a>
    </div>
    <br>
    <hr>
    <br>
    @if(count($market) > 0)
        <div class="grid-container">
            @foreach($market as $markets)
                <div>
                    <a class="market" href="show/{{$markets->id}}">
                        <img src="/storage/photos/{{$markets->photo}}" alt="{{$markets->title}}" width="450" height="320">
                    </a>
                    <br>
                    <h4>{{$markets->title}}</h4>
                </div>
            @endforeach
        </div>

          @else
        <p>No Photos Found</p>
    @endif
@endsection