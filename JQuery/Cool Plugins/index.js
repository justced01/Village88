$(document).ready(function() {
    var nav = document.querySelector('#navigation');
    var ms = new MenuSpy(nav);
    $('form').materializeInputs();
    $(window).scroll(function() {
        if ($(this).scrollTop() > 600) {
            $(".scrollup").fadeIn();
        } else {
            $(".scrollup").fadeOut();
        }
    });
    $(".scrollup").click(function() {
        $("html, body").animate({
            scrollTop: 0
        }, 600);
        return false;
    });
})