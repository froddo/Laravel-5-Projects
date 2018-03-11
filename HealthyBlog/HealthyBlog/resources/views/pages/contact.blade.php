<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact Us</title>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('/css/style.css')}}">
</head>
<body>
<div class="jumbotron jumbotron-sub">
    <nav class="navbar">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <i id="button" class="fa fa-arrow-circle-down"></i>
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/"><img src="https://images.cooltext.com/5086771.png" height="25" width="160"></a>
            </div>
            <div id="navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="/yoga">Yoga</a></li>
                    <li><a href="/food">Healthy</a></li>
                    <li><a href="/hobbies">Hobbies</a></li>
                    <li><a href="/music">Music</a></li>
                    <li><a href="/blog">Blog</a></li>
                    <li><a href="/contact">Contacts</a></li>
                    <li><a href="/about">About Me</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <h1>Contact Me</h1>
    </div>
</div>

<div class="container">
    @include('inc.messages')
    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Contact Me</h3>
                </div>
                <div class="panel-body">
                    <p>Please fill out this form to contact me</p>
                    <form action="{{route('contact.post')}}" method="post" >
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Message</label>
                            <textarea name="message" class="form-control"></textarea>
                        </div>

                        <button type="submit" class="btn btn-default">Submit</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="well">
                <h3>More About Me</h3>
                <p class="text-success">For more information, click here...</p>
                <a href="{{'/about'}}" class="btn btn-primary pull-center">
                    <i class="fa fa-pencil"></i> About Me
                </a>
            </div>
        </div>
    </div>
</div>

<footer class="main-footer">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <h3 class="text-warning">About Me</h3>
                <h4><a href="https://github.com/froddo" target="_blank">GitHub</a></h4>
                <p>Copyright &copy; {{date('Y')}} All rights reserved</p>
            </div>
        </div>
    </div>
</footer>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="{{asset('/js/bootstrap.js')}}"></script>
</body>
</html>