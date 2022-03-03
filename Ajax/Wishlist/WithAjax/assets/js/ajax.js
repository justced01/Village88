$(document).ready(function(){
    alert("Loaded");
    $.get('items/render', function(res){
        $('#item-list').html(res);
    });
    $(document).on('submit', 'form', function(){
        $.post($(this).attr('action'), $(this).serialize(), function(res){
            $('#item-list').html(res);
        });
        return false;
    });

    $(document).on('click', '.item-check', function(){
        if($(this).is(':checked')){
            $(this).attr('disabled', true);
            $(this).parent().addClass('disabled');
        }
    })
    $(document).on({
        mouseenter: function(){
            var pencilIcon = '<span class="pencil-icon"><img src="https://img.icons8.com/ios-filled/50/000000/pencil--v1.png" ></span>';
            if(!$(this).parent().hasClass('disabled')){
                $(this).append($(pencilIcon));
            }
            var value = $(this).text();
            $(this).on('click', 'span img', function(){
                $(this).parent().parent().replaceWith('<textarea name="item">' + value + '</textarea>');
            });
        },
        mouseleave: function(){
            $(this).find('span').last().remove();
        }
    }, '.checkbox-field label'); 
    $(document).on('change', 'form.item-form textarea', function(){
        $(this).parent().parent().submit();
    });
})
