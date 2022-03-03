$(document).ready(function() {
    window.setInterval(function() {
        var i = Math.floor(Math.random() * 31);
        $( 'img' ).hover(function() {
            $( this ).attr( 'src', './fortune_cookie_pics/advice' + i + '.PNG');
        }, function() {
            $( this ).attr( 'src', './fortune_cookie_pics/cookie.jpg');
        })
    }, 500);
})