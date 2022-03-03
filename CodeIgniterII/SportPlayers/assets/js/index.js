$(document).ready(function(){
    $('input.sex').on('change', function() {
        $('input.sex').not(this).prop('checked', false);  
    });
    $('input.sport').on('change', function() {
        $('input.sport').not(this).prop('checked', false);  
    });
});