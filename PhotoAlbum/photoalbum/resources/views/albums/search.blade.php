@extends('layouts.default')

@section('content')
<div id="container">

    <header>
        <h3>Search <span>Album</span></h3>

    </header>
    <section>
        <form id="search-form" name="search-form">
            <div class="fieldcontainer">
                <input type="search"  id="query" class="search-field" onkeyup="myFunction()" placeholder="Search Album...">
                <input type="submit"  name="search-btn" id="search-btn" value="">
            </div>
        </form>
    </section>
    <ul id="myUL">
        @foreach($albums as $album)
            <li><a href="/albums/{{$album->id}}">{{$album->name}}</a></li>
        @endforeach
    </ul>
    <footer>
        <p>Copyright &copy; <script>document.write(new Date().getFullYear())</script><img src="https://images.cooltext.com/5086771.png"> All Rights Reserved</p>
    </footer>
</div>
@endsection
