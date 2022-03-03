$(document).ready(function(){
    $('.mini_boxes').click(function(event){
        event.stopPropagation();
        var bgClicked = $(this).attr('src');
        $('#main_box').css('background-image', 'url(' + bgClicked + ')');
    })
});