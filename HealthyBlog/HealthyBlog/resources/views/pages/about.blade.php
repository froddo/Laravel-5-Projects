<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My Portfolio</title>
    <link rel="stylesheet" href="/portfolio/src/css/font-awesome.min.css">
    <link rel="stylesheet" href="/portfolio/src/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css" />
    <link rel="stylesheet" href="/portfolio/src/css/style.css">
</head>
<body>
<div class="container">
    @include('inc.messages')
    <header id="main-header">
        <div class="row no-gutters">
            <div class="col-lg-4 col-md-5">
                <img src="/portfolio/src/img/Rumen Topalov.jpg">
            </div>
            <div class="col-lg-8 col-md-7">
                <div class="d-flex flex-column">
                    <div class="p-5 bg-dark text-white">
                        <div class="name d-flex flex-row justify-content-between align-items-center">
                            <h1 class="display-5">Rumen Topalov</h1>
                            <div><a class="text-white" href="https://github.com/froddo" target="_blank"><i class="fa fa-github"></i></a></div>
                            <div><a class="text-white" href="https://www.linkedin.com/in/topalovr/" target="_blank"><i class="fa fa-linkedin"></i></a></div>
                            <div><i class="fa fa-facebook"></i></div>
                            <div><i class="fa fa-instagram"></i></div>
                        </div>
                    </div>
                    <div class="p-4 bg-black">
                        Experienced Full Stack Web Developer
                    </div>
                    <div>
                        <div class="d-flex flex-row text-white align-items-stretch text-center">
                            <div class="port-item p-4 bg-primary" data-toggle="collapse" data-target="#home">
                                <i class="fa fa-home d-block"></i> Home
                            </div>
                            <div class="port-item p-4 bg-success" data-toggle="collapse" data-target="#resume">
                                <i class="fa fa-graduation-cap d-block"></i> Resume
                            </div>
                            <div class="port-item p-4 bg-warning" data-toggle="collapse" data-target="#work">
                                <i class="fa fa-folder-open d-block"></i> Work
                            </div>
                            <div class="port-item p-4 bg-danger" data-toggle="collapse" data-target="#contact">
                                <i class="fa fa-envelope d-block"></i> Contact
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </header>
    <!-- Home   -->
    <div id="home" class="collapse show">
        <div class="card card-body bg-primary text-white py-5">
            <h2>Welcome to my page</h2>
            <p class="lead">Here are all my projects I've worked on.</p>
        </div>
        <div class="card card-body py-5">
            <h3>My Skills</h3>
            <p>The projects, which I have did, given me the skills to learn these technologies</p>
            <p>PHP, OOP, MVC, REST API, Laravel, MySql, HTML5, CSS, JavaScript, jQuery-Ajax, NPM-Axios.</p>
            <hr>
            <h4>PHP</h4>
            <div class="progress mb-3">
                <div class="progress-bar bg-success" style="width:100%">

                </div>
            </div>
            <h4>JavaScript</h4>
            <div class="progress mb-3">
                <div class="progress-bar bg-success" style="width:90%">

                </div>
            </div>
            <h4>HTML</h4>
            <div class="progress mb-3">
                <div class="progress-bar bg-success" style="width:90%">

                </div>
            </div>
            <h4>CSS</h4>
            <div class="progress mb-3">
                <div class="progress-bar bg-success" style="width:90%">

                </div>
            </div>
        </div>
    </div>
    <!-- Resume -->

    <div id="resume" class="collapse">
        <div class="card card-body bg-success text-white py-5">
            <h2>My Resume</h2>
            <p>The projects that I've done.</p>
        </div>
        <div class="card card-body py-5">
            <h3>What are the projects have I worked?</h3>
            <p class="p-2 mb-3 bg-dark text-white">My acme is: <img src="https://images.cooltext.com/5086771.png" height="25" width="150"></p>

            <div class="card-deck mb-3">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">MessagesBlog</h4>
                        <p class="card-text">Used Technologies...</p>
                        <p class="p-2 mb-3 bg-dark text-white">
                            PHP Laravel 5.4, MySQL, Laravel Collective, Bootstrap 3, Html, Css, Js
                        </p>
                        <p class="p-2 mb-3 bg-dark text-white">
                            Website: <a class="text-white" href="http://www.topalovr.tk" target="_blank">http://www.topalovr.tk</a>
                        </p>
                    </div>
                    <div class="card-footer">
                        <h6 class="text-muted">Dates: 2017 - 2018</h6>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">ItBlog</h4>
                        <p class="card-text">Used Technologies...</p>
                        <p class="p-2 mb-3 bg-dark text-white">
                            PHP Laravel 5.4, NPM-Laravel Mix, Eloquent: Relationships - One To Many, Laravel Collective, MySQL, Bootstrap 3, Html, Css, JS
                        </p>
                        <p class="p-2 mb-3 bg-dark text-white">
                            Website: <a class="text-white" href="http://www.topalovr.ml" target="_blank">http://www.topalovr.ml</a>
                        </p>
                    </div>
                    <div class="card-footer">
                        <h6 class="text-muted">Dates: 2017 - 2018</h6>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">PhotoAlbum</h4>
                        <p class="card-text">Used Technologies...</p>
                        <p class="p-2 mb-3 bg-dark text-white">
                            PHP Laravel 5.5, MySQL, Laravel Collective, jQuery, ZURB Foundation-Front-End Frameworks, Html, Css, Js
                        </p>
                        <p class="p-2 mb-3 bg-dark text-white">
                            Website: <a class="text-white" href="http://www.topalovr.ga" target="_blank">http://www.topalovr.ga</a>
                        </p>
                    </div>
                    <div class="card-footer">
                        <h6 class="text-muted">Dates: 2017 - 2018</h6>
                    </div>
                </div>
            </div>
            <div class="card-deck mb-3">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">PhotoSell</h4>
                        <p class="card-text">Used Technologies...</p>
                        <p class="p-2 mb-3 bg-dark text-white">
                            PHP Laravel 5.4, MySQL, Ajax/Axios-NPM, Stripe API - Payment App, jQuery, Bootstrap 3, Html, Css, Js
                        </p>
                        <p class="p-2 mb-3 bg-dark text-white">
                            Website: <a class="text-white" href="http://www.topalovr.cf" target="_blank">http://www.topalovr.cf</a>
                        </p>
                    </div>
                    <div class="card-footer">
                        <h6 class="text-muted">Dates: 2017 - 2018</h6>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">MusicGallery</h4>
                        <p class="card-text">Used Technologies...</p>
                        <p class="p-2 mb-3 bg-dark text-white">
                            PHP Laravel 5.4, MySQL, Laravel Collective, Bootstrap 3, Html, Css, Js
                        </p>
                        <p class="p-2 mb-3 bg-dark text-white">
                            Website: <a class="text-white" href="http://www.topalovr-music.tk" target="_blank">http://www.topalovr-music.tk</a>
                        </p>
                    </div>
                    <div class="card-footer">
                        <h6 class="text-muted">Dates: 2017 - 2018</h6>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">My Portfolio</h4>
                        <p class="card-text">Used Technologies...</p>
                        <p class="p-2 mb-3 bg-dark text-white">
                            PHP Laravel 5.5, MySQL, Bootstrap 4, jQuery, NPM-Gulp, Html, Css, Js, Lightbox for Bootstrap 4
                        </p>
                        <p class="p-2 mb-3 bg-dark text-white">
                            Website: <a class="text-white" href="http://www.topalovr-portfolio.tk" target="_blank">http://www.topalovr-portfolio.tk</a>
                        </p>
                    </div>
                    <div class="card-footer">
                        <h6 class="text-muted">Dates: 2017 - 2018</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Work -->
    <div id="work" class="collapse">
        <div class="card card-body bg-warning py-5">
            <h3>My Portfolio</h3>
            <p>My portfolio pictures.</p>
        </div>
        <div class="card card-body py-5">
            <h3>What have I built?</h3>
            <p>Click on the picture.</p>
            <div class="row no-gutters">
                <div class="col md 3">
                    <a href="/portfolio/src/portfoliopictures/myportfolio.jpg" data-toggle="lightbox">
                        <img src="/portfolio/src/portfoliopictures/myportfolio.jpg" class="img-fluid">
                    </a>
                </div>
                <div class="col md 3">
                    <a href="/portfolio/src/portfoliopictures/messagesblog.jpg" data-toggle="lightbox">
                        <img src="/portfolio/src/portfoliopictures/messagesblog.jpg" class="img-fluid">
                    </a>
                </div>
                <div class="col md 3">
                    <a href="/portfolio/src/portfoliopictures/itblog.jpg" data-toggle="lightbox">
                        <img src="/portfolio/src/portfoliopictures/itblog.jpg" class="img-fluid">
                    </a>
                </div>
                <div class="col md 3">
                    <a href="/portfolio/src/portfoliopictures/photoalbum.jpg" data-toggle="lightbox">
                        <img src="/portfolio/src/portfoliopictures/photoalbum.jpg" class="img-fluid">
                    </a>
                </div>
            </div>
            <div class="row no-gutters">

                <div class="col md 3">
                    <a href="/portfolio/src/portfoliopictures/photoalbumcreativity.jpg" data-toggle="lightbox">
                        <img src="/portfolio/src/portfoliopictures/photoalbumcreativity.jpg" class="img-fluid">
                    </a>
                </div>
                <div class="col md 3">
                    <a href="/portfolio/src/portfoliopictures/photomarket.jpg" data-toggle="lightbox">
                        <img src="/portfolio/src/portfoliopictures/photomarket.jpg" class="img-fluid">
                    </a>
                </div>
                <div class="col md 3">
                    <a href="/portfolio/src/portfoliopictures/photomarketpic.jpg" data-toggle="lightbox">
                        <img src="/portfolio/src/portfoliopictures/photomarketpic.jpg" class="img-fluid">
                    </a>
                </div>
                <div class="col md 3">
                    <a href="/portfolio/src/portfoliopictures/photomarketpay.jpg" data-toggle="lightbox">
                        <img src="/portfolio/src/portfoliopictures/photomarketpay.jpg" class="img-fluid">
                    </a>
                </div>
            </div>
            <div class="row no-gutters">
                <div class="col md 3">
                    <a href="/portfolio/src/portfoliopictures/photomarketadd.jpg" data-toggle="lightbox">
                        <img src="/portfolio/src/portfoliopictures/photomarketadd.jpg" class="img-fluid">
                    </a>
                </div>
                <div class="col md 3">
                    <a href="/portfolio/src/portfoliopictures/contacthealth.jpg" data-toggle="lightbox">
                        <img src="/portfolio/src/portfoliopictures/contacthealth.jpg" class="img-fluid">
                    </a>
                </div>
                <div class="col md 3">
                    <a href="/portfolio/src/portfoliopictures/healthy.jpg" data-toggle="lightbox">
                        <img src="/portfolio/src/portfoliopictures/healthy.jpg" class="img-fluid">
                    </a>
                </div>
                <div class="col md 3">
                    <a href="/portfolio/src/portfoliopictures/yoga.jpg" data-toggle="lightbox">
                        <img src="/portfolio/src/portfoliopictures/yoga.jpg" class="img-fluid">
                    </a>
                </div>
            </div>

            <div class="row no-gutters">

                <div class="col md 3">
                    <a href="/portfolio/src/portfoliopictures/food.jpg" data-toggle="lightbox">
                        <img src="/portfolio/src/portfoliopictures/food.jpg" class="img-fluid">
                    </a>
                </div>
                <div class="col md 3">
                    <a href="/portfolio/src/portfoliopictures/music.jpg" data-toggle="lightbox">
                        <img src="/portfolio/src/portfoliopictures/music.jpg" class="img-fluid">
                    </a>
                </div>
                <div class="col md 3">
                    <a href="/portfolio/src/portfoliopictures/music1.jpg" data-toggle="lightbox">
                        <img src="/portfolio/src/portfoliopictures/music1.jpg" class="img-fluid">
                    </a>
                </div>

                <div class="col md 3">
                    <a href="/portfolio/src/portfoliopictures/portfolio.jpg" data-toggle="lightbox">
                        <img src="/portfolio/src/portfoliopictures/portfolio.jpg" class="img-fluid">
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Contact -->

    <div id="contact" class="collapse">
        <div class="card card-body bg-danger text-white py-5">
            <h2>Contact Me</h2>
            <p>You can use the contact form for any further queries. Please also feel free to contact with me.</p>
        </div>
        <div class="card card-body py-5">
            <h3>Get in touch</h3>
            <p>Send your message directly to me.</p>
            <form action="{{route('contact.post')}}" method="post">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <div class="input-group-lg input-group-lg mb-3">
                    <div class="input-group-lg input-group-prepend">
                            <span class="input-group-text bg-danger text-white">
                            <i class="fa fa-user"></i>
                            </span>
                        <input type="text" name="name" class="form-control bg-dark text-white" placeholder="Name" >
                    </div>
                </div>

                <div class="input-group-lg input-group-lg mb-3">
                    <div class="input-group-lg input-group-prepend">
                            <span class="input-group-text bg-danger text-white">
                            <i class="fa fa-envelope"></i>
                            </span>
                        <input type="email" name="email" class="form-control bg-dark text-white" placeholder="Email" >
                    </div>
                </div>

                <div class="input-group-lg input-group-lg mb-3">
                    <div class="input-group-lg input-group-prepend">
                            <span class="input-group-text bg-danger text-white">
                            <i class="fa fa-pencil"></i>
                            </span>
                        <textarea rows="5" name="message" class="form-control bg-dark text-white" placeholder="Message"></textarea>
                    </div>
                </div>

                <input type="submit" value="Submit" class="btn btn-danger btn-block btn-lg">
            </form>
        </div>
    </div>



    <!-- Footer -->
    <footer id="main-footer" class="p-5 bg-dark text-white">
        <div class="row">
            <div class="col-md-6">
                <a href="https://drive.google.com/drive/folders/1IFN1spPZSsm7B8ksydq5xG_vk7zGaKH2" target="_blank" class="btn btn-outline-light"><i class="fa fa-cloud"></i> Download Resume</a>
            </div>
        </div>
    </footer>
</div>

<script src="/portfolio/src/js/jquery.min.js"></script>
<script src="/portfolio/src/js/popper.min.js"></script>
<script src="/portfolio/src/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.js"></script>
<script>
    $('.port-item').click(function () {
        $('.collapse').collapse('hide');
    });

    $(document).on('click', '[data-toggle="lightbox"]', function(event) {
        event.preventDefault();
        $(this).ekkoLightbox();
    });
</script>
</body>
</html>