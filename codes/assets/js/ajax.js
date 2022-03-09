$(document).ready(function(){
    $('#addProductForm').ajaxForm(function(data){ 
        var obj = JSON.parse(data);
        if(obj.errors === 'valid'){
            window.location.replace(base_url + 'products');
        }
        else {
            $('#csrf_token').val(obj.token);
            $('#errors').html(obj.errors);
        }
    }); 
})
