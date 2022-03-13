$(document).ready(function(){
    $("#addProductForm").ajaxForm(function(data){ 
        var obj = JSON.parse(data);
        if(obj.response_code === 200){
            window.location.href = base_url + "dashboard/products";
        }
        else {
            $("input#csrf_token").val(obj.token);
            $("#errors").html("<p class='text-md text-red-500'>" + obj.response + "</p>");
        }
    }); 

    $("#editProductForm").ajaxForm(function(data){ 
        var obj = JSON.parse(data);
        if(obj.response_code === 200){
            $("#edit_csrf_token").val(obj.token);
            $("#response").html("<p class='text-md text-green-900'>" + obj.response + "</p>");
            window.location.href = base_url + "dashboard/products";
        }
        else {
            $("#edit_csrf_token").val(obj.token);
            $("#response").html("<p class='text-md text-red-500'>" + obj.response + "</p>");
        }
    }); 

    $(this).on("submit", "#searchForm", function(){
        $.post($(this).attr('action'), $(this).serialize(), function(data){
            $("#product-row").html(data);
            $("#csrf_token").val($("#productTable").attr("data-csrf"));
        });
        return false;
    });
    $(this).on("change", "#searchForm", function(){
        $(this).submit();
    });

    $(this).on("submit", "#searchCatalogForm", function(){
        $.post($(this).attr('action'), $(this).serialize(), function(data){
            $("#catalogProducts").html(data);
            $(".csrf_token").val($("#csrf").attr("data-csrf"));
        });
        return false;
    });
    $(this).on("change", "#searchCatalogForm", function(){
        $(this).submit();
    });

    $(this).on("submit", "#sortForm", function(){
        $.post($(this).attr('action'), $(this).serialize(), function(data){
            $("#catalogProducts").html(data);
            $(".csrf_token").val($("#csrf").attr("data-csrf"));
        });
        return false;
    });
    $(this).on("change", "#sortForm", function(){
        $(this).submit();
    });

    $(this).on("submit", "#buyForm", function(){

        $("#notif").fadeIn(1000);
        $("#notif").fadeOut(5000);

        return false;
    });
})

