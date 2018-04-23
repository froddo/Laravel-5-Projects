<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Blog') }}</title>

    @yield('styles')
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Blog') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ route('login') }}">Login</a></li>
                        @else
                           @if(Auth::user()->admin)
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                           @endif
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container">

            <div class="row">

                @if(Auth::check())
                    <div class="col-lg-4">
                        <ul class="list-group">

                            @if(Auth::user()->admin)
                                <li class="list-group-item"><a href="{{ route('home') }}">Home</a></li>
                                <li class="list-group-item"><a href="{{ route('user.index') }}">All Users</a></li>
                                <li class="list-group-item"><a href="{{ route('user.create') }}">Create new user</a></li>
                                <li class="list-group-item"><a href="{{ route('profile.index') }}">My Profile</a></li>
                                <li class="list-group-item"><a href="{{ route('tag.index') }}">All Tags</a></li>
                                <li class="list-group-item"><a href="{{ route('tag.create') }}">Create new tag</a></li>
                                <li class="list-group-item"><a href="{{ route('category.index') }}">All Categories</a></li>
                                <li class="list-group-item"><a href="{{ route('category.create') }}">Create new category</a></li>
                                <li class="list-group-item"><a href="{{ route('post.index') }}">All posts</a></li>
                                <li class="list-group-item"><a href="{{ route('post.create') }}">Create new post</a></li>
                                <li class="list-group-item"><a href="{{ route('posts.trashed') }}">Trashed posts</a></li>
                                <li class="list-group-item"><a href="{{ route('settings') }}">Settings</a></li>
                            @endif
                        </ul>
                    </div>
                @endif
                    <div class="col-lg-8">
                        @if(Auth::check())
                            @include('inc.messages')
                        @endif
                        @yield('content')
                    </div>
            </div>
        </div>

    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    <script defer src="https://use.fontawesome.com/releases/v5.0.10/js/all.js" integrity="sha384-slN8GvtUJGnv6ca26v8EzVaR9DC58QEwsIk9q1QXdCU8Yu8ck/tL/5szYlBbqmS+" crossorigin="anonymous"></script>
    <script src="{{ asset('js/toastr.min.js') }}"></script>
    <script>
        @if (Session::has('success'))
           toastr.success("{{ Session::get('success') }}");
        @endif

        @if (Session::has('info'))
        toastr.info("{{ Session::get('info') }}");
        @endif
    </script>

    @yield('scripts')
</body>
</html>
