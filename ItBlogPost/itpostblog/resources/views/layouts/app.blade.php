<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        html {
            position: relative;
            min-height: 100%;
        }
        body {
            margin: 0 0 50px; /* bottom = footer height */
        }
        .footer {
            position: fixed; bottom: 0 ;
            right: 0;
            left: 0;
            padding: 1rem;
            background-color: #efefef;
            text-align: center;
        }
    </style>
</head>
<body>
    <div id="app">
        @include('inc.navbar')
        <div class="container">
            @include('inc.messages')
            @yield('content')
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'article-ckeditor' );
    </script>
    <footer id="footer" class="text-center">
        <div class="footer">Copyright <?php echo date('Y')?> &copy; <strong>TopalovR</strong></div>
    </footer>
</body>
</html>
