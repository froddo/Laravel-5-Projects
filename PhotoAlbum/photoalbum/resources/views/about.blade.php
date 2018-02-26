@extends('layouts.default')

@section('content')
   <div class="grow">
        <img id="crop" class="thumbnail" src="storage/img/about1.jpg" alt="about-me">
   </div>
   <hr>
    <a id="about" class="button">About Me</a>
   <div class="about">
       <div id="container">
           <div class="title">
               <h3>About Me</h3>
           </div>
           <ul class="faq">
               <li class="q"><img src="css/contact/img/arrow.png">Name</li>
               <li class="a">Rumen Topalov</li>

               <li class="q"><img src="css/contact/img/arrow.png">My Projects</li>
               <li id="project" class="a">
                   <a href="http://www.topalovr.ml/" target="_blank">1. ItBlog</a><label>&nbsp;&nbsp; Used Technologies -- PHP Laravel 5.4, MySQL, Laravel Collective, Bootstrap, Html, Css</label><br>
                   <a href="http://www.topalovr.tk/" target="_blank">2. MessagesBlog</a><label>&nbsp;&nbsp; Used Technologies -- PHP Laravel 5.4, MySQL, Laravel Collective, Bootstrap, Html, Css, Js</label><br>
                   <a href="http://www.topalovr.cf" target="_blank">3. PhotoSell</a><label>&nbsp;&nbsp; Used Technologies -- PHP Laravel 5.4, MySQL, Ajax-Axios-Npm, Stripe API - Payment App, jQuery, Bootstrap, Html, Css, Js</label><br>
                   <a href="http://www.topalovr.ga" target="_blank">4. PhotoAlbum</a><label>&nbsp;&nbsp; Used Technologies -- PHP Laravel 5.5, MySQL, Laravel Collective, jQuery, Foundation-front-end frameworks, Html, Css, Js</label>
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
    <br>

@endsection