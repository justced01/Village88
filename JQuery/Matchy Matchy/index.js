$('img').click(function() {
    var defaultImg = $(this).attr('src');
    $(this).attr('src', './assets/red_candy.png').click(function() {
        $(this).attr('src', defaultImg )
    });
});

