<!DOCTYPE html>
<html>
<head>
    <title>TodoList</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="/css/app.css">
    <script type="text/javascript" src="/js/app.js"></script>
</head>
<body>
    @include('inc.navbar')
    <div class="container">
        @include('inc.messages')
        @yield('content')

    </div>
<footer id="footer" class="text-center">
    <p>Copyright &copy; <?php echo date('Y'); ?> TodoList</p>
</footer>
</body>
</html>