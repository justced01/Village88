$(document).ready(function(){
    // we are getting all of the quotes whenever the user first requests the page
    $.get('orders_ajax/index_html', function(res){
        $('#orders').html(res);
    });
    $('form').submit(function(){
        $.post('orders_ajax/process_order', $(this).serialize(), function(res){
            $('#orders').html(res);
        });
        return false;
    });
});