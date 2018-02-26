$(function () {
    var searchField = $('#query');
    var icon = $('#search-btn');

    //focus event handler
    $(searchField).on('focus', function () {
        $(this).animate({
            width:'100%'
        },400);
        $(icon).animate({
            right: '10px'
        },400);
    });

    //blur event handler
    $(searchField).on('blur', function () {
        if (searchField.val() == ''){
            $(searchField).animate({
                width:'45%'
            }, 400, function () {});
            $(icon).animate({
                right:'600px'
            }, 400, function () {});
        }
    });

});

//Show search result
$(document).ready(function () {
    $('#myUL').hide()
});
function myFunction() {
    var searchAlbum = $('#query');
    $(document).ready(function () {


        $('#myUL').show();

        if(searchAlbum.val() == ''){
            $('#myUL').hide();
        }
    });
    var input, filter, ul, li, a, i;
    input = document.getElementById("query");
    filter = input.value.toUpperCase();
    ul = document.getElementById("myUL");
    li = ul.getElementsByTagName("li");
    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("a")[0];
        if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "";
        } else {
            li[i].style.display = "none";

        }
    }
}

$(document).ready(function () {
    $('.start').hide();
    $('.menu-text').mouseenter(function () {

        $('.start').show();
        $('.menu-text').hide();
        $('.start').css('cursor','pointer');

    });
    $('.start').mouseleave(function () {
        $(this).hide();
        $('.menu-text').show();
    });
});