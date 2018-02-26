var action = 'click';
var speed = '500';

$(document).ready(function () {
   $('li.q').on(action, function () {

       //Get next element
       $(this).next().slideToggle(speed).siblings('li.a').slideUp();

       //Get image for active question
       var img = $(this).children('img');

       //Remove the 'rotate' class for all images except the active

       $('img').not(img).removeClass('rotate');

       //Toggle rotate class

       img.toggleClass('rotate');
   });

   //about me animation
   $('.about').hide();

   $('#about').click(function () {
       $('.about').slideToggle('slow');
   });
});