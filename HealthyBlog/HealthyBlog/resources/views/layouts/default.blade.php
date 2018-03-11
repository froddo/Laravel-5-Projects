<!DOCTYPE html>
<html>
<head>
<title>@yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>
<body>
    @include('inc.navbar')
    <div class="container">
        @include('inc.messages')
        @yield('content')
    </div>
    @yield('sidebar')
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    @if(Request::is('yoga'))
        <footer class="text-muted">
            <div class="container">
                <p class="float-right">
                    <a class="text-info" href="#">Back to top</a>
                </p>
                <p class="text-info">Copyright &copy; {{date('Y')}} All rights reserved</p>
                <h4 class="text-success">Здравето и петте тела.</h4>
                <p>Йога има различна гледна точка, йога вижда индивида като съчетание на пет тела: физическото тяло, енергийното тяло, тялото на ума, тялото на интелигентността и тялото на блаженството. Тези различни тела са познати като коши. Физическото тяло е анамая коша; праничното (енергийно б.п.) тяло е пранамая коша, менталното тяло е маномая коша, тялото на интелигентността, интуицията е вигянамая коша и тялото на блаженството е анандамая коша. Това са петте компонента на човешкото тяло, които трябва да вземем под внимание когато гледаме здравето.</p>
            </div>
        </footer>
    @endif
    @if(Request::is('food'))
        <footer class="text-muted">
            <div class="container">
                <p class="float-right">
                    <a class="text-info" href="#">Back to top</a>
                </p>
                <p class="text-info">Copyright &copy; {{date('Y')}} All rights reserved</p>
                <h4 class="text-success">Какво дефинира здравословното хранене.</h4>
                <p>Здравословно хранене, комбинирано с физическа активност се смята за най-безопасен и надежден начин дългосрочно да се понижи риска от болести и да се достигне или поддържа оптимално тегло и красива визия.</p>
            </div>
        </footer>
    @endif
    @if(Request::is('hobbies'))
        <footer class="text-muted">
            <div class="container">
                <p class="float-right">
                    <a class="text-info" href="#">Back to top</a>
                </p>
                <p class="text-info">Copyright &copy; {{date('Y')}} All rights reserved</p>
                <h4 class="text-success">Кой е най-скъпият чай в света.</h4>
                <p>Годишната реколта на този чай е по-малко от половин килограм. Чаят идва от Китай и се казва “Червена мантия” (Дахунпао).
                    Реколтата е само от 6 храста, които растат до манастира Тянсин и са на възраст 350 години.
                    Чаят е ферментирал и е достигнал до ниво на оксидация – оолонг.
                    Едва ли този чай може да се купи от някъде. Цялата реколта през 2005 е запазена за китайския музей.</p>
            </div>
        </footer>
    @endif
    @if(Request::is('music'))
        <footer class="text-muted">
            <div class="container">
                <p class="float-right">
                    <a class="text-info" href="#">Back to top</a>
                </p>
                <p class="text-info">Copyright &copy; {{date('Y')}} All rights reserved</p>
                <h4 class="text-success">Как ни променя музиката.</h4>
                <p>Музиката предизвиква дейност в същата структура на мозъка, която е отговорна и за удоволствието, свързано със секс или с храната (т.е. за производството на допамин). Пулсът и сърдечната дейност следват ритъма на музиката, която слушате.</p>
            </div>
        </footer>
    @endif
    @if(Request::is('blog'))
        <footer class="text-muted">
            <div class="container">
                <div class="p-2 mb-2 bg-light text-dark">
                <p class="float-right">
                    <a class="text-info" href="#">Back to top</a>
                </p>
                <p class="text-info">Copyright &copy; {{date('Y')}} All rights reserved</p>
                </div>
            </div>
        </footer>
    @endif
</body>
</html>