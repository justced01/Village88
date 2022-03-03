$(document).ready(function(){
    var updateBtn = "<input type='submit' value='Update'>";
    $.get('index', function(res){
        $('#orders').html(res);
    });
    $('.delete-form').submit(function(){
        $.post('delete', $(this).serialize(), function(res){
            $('#orders').html(res);
        });
        return false;
    });
    $('p').click(function(){
        $(this).replaceWith("<textarea class='order-info' name='order'>" + $(this).text() + "</textarea>" + updateBtn);
    });
    $('.update-form').submit(function(){
        $.post('update', $(this).serialize(), function(res){
            $('#orders').html(res);
        });
        return false;
    });
    $('.order-form').submit(function(){
        $.post('process', $(this).serialize(), function(res){
            $('#orders').html(res);
        });
        return false;
    });
});

function deleteOrder(action){
    $('.delete-form').submit(function(){
        $.post(action, $(this).serialize(), function(res){
            $('#orders').html(res);
        });
        return false;
    });
}
function updateOrder(action){
    $('.update-form').submit(function(){
        $.post(action, $(this).serialize(), function(res){
            $('#orders').html(res);
        });
        return false;
    });
}