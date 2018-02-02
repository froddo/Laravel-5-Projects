<!DOCTYPE html>
<html>
<head>
<title>photo</title>
<meta charset="utf-8">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.3.1/css/foundation.css">

</head>
<body>
@include('inc.topbar')
<br>
<div class=row>
    @include('inc.messages')
    @yield('content')
</div>
</body>
</html>