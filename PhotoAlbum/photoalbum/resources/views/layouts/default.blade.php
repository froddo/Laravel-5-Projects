<!DOCTYPE html>
<html>
<head>
    <title>PhotoAlbum</title>
    <meta charset="utf-8">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.3.1/css/foundation.css">
    @if(Request::is('about'))
        <link rel="stylesheet" href="{{asset('css/contact/css/style.css')}}">
        <link rel="stylesheet" href="{{asset('css/style.css')}}">
    @endif
    <link rel="stylesheet" href="{{asset('css/style.css')}}">


</head>
<body>
    @include('inc.topbar')
    <br>
    <div class="row">
        @include('inc.messages')
        @yield('content')
    </div>

    <script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('js/custom.js')}}"></script>
    <script src="{{ asset('css/contact/js/script.js') }}"></script>
    @if(!Request::is('albums/search'))
    <footer class="footer">
        <p>Copyright &copy; <script>document.write(new Date().getFullYear())</script><img src="https://images.cooltext.com/5086771.png"> All Rights Reserved</p>
    </footer>
    @endif

</body>
</html>