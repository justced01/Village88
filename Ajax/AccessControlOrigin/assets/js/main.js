$(document).ready(function() {
    $('form').submit(function() {
        // load up any gif you want, this will be shown while user is waiting for response
        var base_url = window.location.origin;
        $('#results').html("<img src='" + base_url + "/assets/img/loading-buffering.gif'>");
        $.post($(this).attr('action'), $(this).serialize(), function(res) {
            console.log(res);
            var html_string = "";
            if(res.length !== 0) {
                html_string = "<img src='" + res.screenshots[0].image + "'/>";
            } else {
                html_string = "Not Found";
            }
            $('#results').html(html_string);
        }, 'json');
        return false;   // don't forget, without this, the page will refresh
    });
});