$(document).ready(function(){
    $(document).on('submit', 'form', function(){
        $.post($(this).attr('action'), $(this).serialize(), function(res){
            $('#row').html(res);
            console.log(res);
        });
        return false;
    });
    $(document).on('change', 'form input[type=text]', function(){
        $(this).parent().submit();
    });
    $(document).on('change', '#sort', function(){
        $(this).parent().submit();
    });
})