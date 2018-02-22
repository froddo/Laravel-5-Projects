<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <link rel="stylesheet" href="{{asset('css/contact/css/style.css')}}">

    <link rel="stylesheet" href="{{ asset('css/formcontact/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styless.css') }}" rel="stylesheet">
</head>
<body>
@include('inc.navbar')
@include('inc.messages')
<div id="container">
    @yield('content')
</div>
<script src="{{ asset('js/formcontact/form.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/custom.js') }}"></script>
<script src="{{ asset('css/contact/js/script.js') }}"></script>

@if(Request::is('market/show'))
    <footer id="footmarket">
        <p><span style="position: relative; bottom: 5px;">Copyright {{date('Y')}} &copy;</span> <img src="https://images.cooltext.com/5086771.png"  style="position: relative; bottom: -2px;" height="25" width="150"></p>
    </footer>
@endif
@if((Request::is('/') ||Request::is('contact') || Request::is('market')))
    <footer class="foot">
        <p><span style="position: relative; bottom: 5px;">Copyright {{date('Y')}} &copy;</span> <img src="https://images.cooltext.com/5086771.png"  style="position: relative; bottom: -2px;" height="25" width="150"></p>
    </footer>
@endif
<span class="scrollToTop">Scroll To Top</span>
</body>
</html>
