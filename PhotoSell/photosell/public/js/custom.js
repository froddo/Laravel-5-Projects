$(document).ready(function () {
    //show-hide form
    $('#addModal').hide();
    $('.btnDark').click(function () {
        $('#addModal').toggle('slow');
    });

    //photo zoom
    $('#size').hide();
    $( "#go" ).click(function() {
        $('#first').hide();
        $( "#size" ).show('slow');
    });
    $( "#go1" ).click(function() {
        $('#first').show('slow');
        $('#size').hide();
    });

    $("#first").mouseenter(function(){
        $('#mouse').text('Click For Zoom').css('color','grey');
    });
    $("#first").mouseleave(function(){
        $('#mouse').text('');
    });


//Check to see if the window is top if not then display button
    $(window).scroll(function(){
        if ($(this).scrollTop() > 100) {
            $('.scrollToTop').fadeIn();
        } else {
            $('.scrollToTop').fadeOut();
        }
    });

    //Click event to scroll to top
    $('.scrollToTop').click(function(){
        $('html, body').animate({scrollTop : 0},800);
        return false;
    });


    var speed = 500; //fade speed
    var autoswitch = true; //auto slider option
    var autoswitch_speed = 4000; //Auto slider speed

    //add initial active class
    $('.slide').first().addClass('active');

    //hide all slides
    $('.slide').hide();

    //show first slider
    $('.active').show('active');

    //next slider
    $('#next').on('click',nextSlide);

    //prev slider
    $('#prev').on('click',prevSlide);

    //auto switch slide
    if (autoswitch == true){
        setInterval(nextSlide,autoswitch_speed);
    }


    //switch to next slide
    function nextSlide() {
        $('.active').removeClass('active').addClass('oldActive');
        if ($('.oldActive').is(':last-child')){
            $('.slide').first().addClass('active');
        }
        else{
            $('.oldActive').next().addClass('active')
        }
        $('.oldActive').removeClass('oldActive');

        $('.slide').fadeOut(speed);

        $('.active').fadeIn(speed);
    }

    //switch to prev slide

    function prevSlide() {
        $('.active').removeClass('active').addClass('oldActive');
        if ($('.oldActive').is(':first-child')){
            $('.slide').last().addClass('active');
        }
        else{
            $('.oldActive').prev().addClass('active')
        }
        $('.oldActive').removeClass('oldActive');

        $('.slide').fadeOut(speed);

        $('.active').fadeIn(speed);
    }


    //send photo form
    $(document).ready(function () {
        $('#contact').hide();

        $('#button').click(function () {
            $('#contact').toggle('slow');
        });
    });
});