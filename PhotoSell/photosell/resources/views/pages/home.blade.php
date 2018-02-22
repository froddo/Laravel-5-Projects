@extends('layouts.default')

@section('title','Home')

@section('content')
    <div id="container">
        <header>
            <h1>Welcome to Photo Market</h1>
        </header>
        <img src="img/arrow-left.png" alt="prev" id="prev">
        <div id="slider">
            <div class="slide">
                <div class="slide-copy">
                    <h2>Slider One</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus at cumque deleniti doloremque eligendi eveniet excepturi facere incidunt molestias, nam perspiciatis quisquam quo sit soluta totam veniam veritatis voluptas. Eum!</p>
                </div>
                <img src="img/slide1.jpg">
            </div>
            <div class="slide">
                <div class="slide-copy">
                    <h2>Slider Two</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus at cumque deleniti doloremque eligendi eveniet excepturi facere incidunt molestias, nam perspiciatis quisquam quo sit soluta totam veniam veritatis voluptas. Eum!</p>
                </div>
                <img src="img/slide2.jpg">
            </div>
            <div class="slide">
                <div class="slide-copy">
                    <h2>Slider Three</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus at cumque deleniti doloremque eligendi eveniet excepturi facere incidunt molestias, nam perspiciatis quisquam quo sit soluta totam veniam veritatis voluptas. Eum!</p>
                </div>
                <img src="img/slide3.jpg">
            </div>
            <div class="slide">
                <div class="slide-copy">
                    <h2>Slider Four</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus at cumque deleniti doloremque eligendi eveniet excepturi facere incidunt molestias, nam perspiciatis quisquam quo sit soluta totam veniam veritatis voluptas. Eum!</p>
                </div>
                <img src="img/slide4.jpg">
            </div>
            <div class="slide">
                <div class="slide-copy">
                    <h2>Slider Five</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus at cumque deleniti doloremque eligendi eveniet excepturi facere incidunt molestias, nam perspiciatis quisquam quo sit soluta totam veniam veritatis voluptas. Eum!</p>
                </div>
                <img src="img/slide5.jpg">
            </div>
            <div class="slide">
                <div class="slide-copy">
                    <h2>Slider Six</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus at cumque deleniti doloremque eligendi eveniet excepturi facere incidunt molestias, nam perspiciatis quisquam quo sit soluta totam veniam veritatis voluptas. Eum!</p>
                </div>
                <img src="img/slide6.jpg">
            </div>
            <div class="slide">
                <div class="slide-copy">
                    <h2>Slider Seven</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus at cumque deleniti doloremque eligendi eveniet excepturi facere incidunt molestias, nam perspiciatis quisquam quo sit soluta totam veniam veritatis voluptas. Eum!</p>
                </div>
                <img src="img/slide7.jpg">
            </div>
        </div>
        <img src="img/arrow-right.png" alt="next" id="next">
    </div>
@endsection