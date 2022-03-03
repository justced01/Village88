$(document).ready(function(){
    alert("Loaded");
    $('.item-check').click(function(){
        if($(this).is(':checked')){
            $(this).attr('disabled', true);
            $(this).parent().addClass('disabled');
        }
    });
    $('.item-form label').hover(function(){
        var pencilIcon = '<span class="pencil-icon"><img src="https://img.icons8.com/ios-filled/50/000000/pencil--v1.png" ></span>';
        $(this).append($(pencilIcon));
    }, function(){
            $(this).find('span').last().remove();
        },
    );
    $('.item-form label').on('click', 'span img', function(){
        $(this).parent().parent().replaceWith('<textarea name="item"></textarea>');
    });
    $(document).on('change', 'form.item-form textarea', function(){
        $(this).parent().parent().submit();
    })
})  
