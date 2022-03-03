$(document).ready(function() {
    $(document).on('submit', 'form.filter-form', function(){
        $.post($(this).attr('action'), $(this).serialize(), function(res){
            $('#assignments').html(res);
            var count = $(res).find('#count').text();
            $('#title').html(count + ' Assignments');
        });
        return false;
    });
    $(document).on('change', 'form input[type=checkbox]', function(){
        $(this).parent().submit();
    });
    $(document).on('change', '#track', function(){
        $(this).parent().submit();
    });
})