function swapClass($obj, beforeClass, afterClass){
    $obj.removeClass(beforeClass);
    $obj.addClass(afterClass);
}

function hasPresence($obj){
    return $obj.val() !== "" && $obj.val() !== null;
}

function meetsLengthRequirements($obj, minLength){
    return $obj.val().length < minLength;
}

function fail($obj){
    swapClass($obj, 'success', 'fail');
}

function success($obj){
    swapClass($obj, 'fail', 'success');
}

$(document).ready(function(){
    $('.quantity').keyup(function(){
        hasPresence($(this)) ? success($(this)) : fail($(this));
    });

    $('.quantity').keyup(function(){
        meetsLengthRequirements($(this), 3) ? success($(this)) : fail($(this));
    });
});