$(document).ready(function(){
    $.get('render', function(res){
        $('#form-notes').html(res);
    });
    $(document).on('submit', 'form', function(){
        $.post($(this).attr('action'), $(this).serialize(), function(res){
            $('#form-notes').html(res);
            console.log(res);
        });
        return false;
    });
    $(document).on('change', 'form.update-form textarea', function(){
        $(this).parent().submit();
    })
})