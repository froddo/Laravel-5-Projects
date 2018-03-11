<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CoffeeTech Slider</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Dancing+Script" rel="stylesheet">
    <link rel="stylesheet" href="/slider/css/style.css">
    <script src="/slider/jquery/jquery-3.2.1.min.js"></script>
    <script src="http://malsup.github.io/jquery.cycle.all.js"></script>
</head>
<body>
@include('inc.navbar')
<div id="container">
    <h1 id="changeText">Yoga</h1>
    <div class="slider">
        <img src="/slider/img/yoga.jpg" width="640" height="426">
        <img src="/slider/img/musicyoga.jpg" width="640" height="426">
        <img src="/slider/img/tea.jpg" width="640" height="426">
        <img src="/slider/img/zdravoslovno.jpg" width="640" height="426">
        <img src="/slider/img/zdravoslovno1.jpg" width="640" height="426">
    </div>
    <ul id="nav">
        <li id="prev"><a href="#">Previous</a></li>
        <li id="next"><a href="#">Next</a></li>
    </ul>
</div>
<script>
    $(document).ready(function () {
        $('.slider').cycle({
            fx: 'shuffle',
            pause: 1,
            prev: '#prev',
            next: '#next'
        });

    });

    var text = ["Music", "Tea", "Healthy Food", "The Right Food","Yoga"];
    var counter = 0;
    var elem = document.getElementById("changeText");
    var inst = setInterval(change, 5000);

    function change() {
        elem.innerHTML = text[counter];
        counter++;
        if (counter >= text.length) {
            counter = 0;
            // clearInterval(inst); // uncomment this if you want to stop refreshing after one cycle
        }
    }
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>