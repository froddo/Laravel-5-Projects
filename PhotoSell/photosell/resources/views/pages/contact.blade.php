@extends('layouts.default')

@section('title','Contact')

@section('content')
    <div class="container">
        <div class="top-box top-box-a">
            <span class="addcontact"><button id="button" class="btnDark">Add Contact</button></span>
            <span class="aboutme"><button id="aboutme" class="btnDark" >About Me</button></span>
        </div>
        <br>
        <hr>
        <br>
        <form id="contact" class="form-style-4" action="{{route('messages.contact')}}" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <label for="field1">
                <span>Enter Your Name</span><input type="text" name="name" required="true" />
            </label>
            <label for="field2">
                <span>Email Address</span><input type="email" name="email" required="true" />
            </label>
            <label for="field3">
                <span>Short Subject</span><input type="text" name="subject" required="true" />
            </label>
            <label for="field4">
                <span>Message to Us</span><textarea name="description" onkeyup="adjust_textarea(this)" required="true"></textarea>
            </label>
            <label>
                <span>&nbsp;</span><input type="submit" value="Send Letter" />
            </label>
        </form>
    </div>
    <div id="about">
    <div id="container">
        <div class="title">
            <h3>About Me</h3>
        </div>
        <ul class="faq">
            <li class="q"><img src="css/contact/img/arrow.png">Name</li>
            <li class="a">Rumen Topalov</li>

            <li class="q"><img src="css/contact/img/arrow.png">My Projects</li>
            <li id="project" class="a">
                <a href="http://www.topalovr.ml/" target="_blank">1. ItBlog</a><label> -->&nbsp; Used Technologies -- PHP Laravel 5.4, MySQL, Laravel Collective, Bootstrap, Html, Css</label><br>
                <a href="http://www.topalovr.tk/" target="_blank">2. MessagesBlog</a><label> -->&nbsp; Used Technologies -- PHP Laravel 5.4, MySQL, Laravel Collective, Bootstrap, Html, Css, Js</label><br>
                <a href="http://www.topalovr.cf" target="_blank">3. PhotoSell</a><label> -->&nbsp; Used Technologies -- PHP Laravel 5.4, MySQL, Ajax-Axios-Npm, Stripe API - Payment App, jQuery, Bootstrap, Html, Css, Js</label>
            </li>

            <li class="q"><img src="css/contact/img/arrow.png">GitHub</li>
            <li id="project" class="a"><a href="https://github.com/froddo" target="_blank">GitHub</a></li>

            <li class="q"><img src="css/contact/img/arrow.png">Email</li>
            <li class="a">topalovr@gmail.com</li>

            <li class="q"><img src="css/contact/img/arrow.png">Phone</li>
            <li class="a">+359 897 647465</li>
        </ul>
    </div>
    </div>
@endsection