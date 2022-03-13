$(document).ready(function(){
    $("#addProductModal").click(function(){
        $(this).modal({
            clickClose: false,
            fadeDuration: 250
        });
        return false;
    });
    $(".edit-product").click(function(){
        $(this).modal({
            clickClose: false,
            fadeDuration: 250
        });
        return false;
    });
    $(function(){
        $("#sortable").sortable({
            revert: true
        });
        $("#draggable").draggable({
            connectToSortable: "#sortable",
            helper: "clone",
            revert: "invalid"
        });
        $("ul, li").disableSelection();
    });

    $("li.category").on({
        mouseenter: function(){
            var category_id = $(this).children("p.category").attr("data-id");
            var delete_url = base_url + "dashboard/remove_category/" + category_id;
            var actions = "<div class='absolute right-0 flex gap-x-2 mr-5 actions'><a href='#edit' id='editButton'><img src='https://img.icons8.com/ios/50/000000/pencil--v1.png' class='w-5'></a>";
            actions += "<a id='deleteButton' href='" + delete_url + "'><img src='data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAABmJLR0QA/wD/AP+gvaeTAAAAhElEQVRIiWNgGOqAkRhFz31sGhgYGOrRdHZKbj5SQbIFz31s/hPrOmxAcssRFDOZKDGMbPDcx+Y/KT7Bp57mPiDKAnQXkuLDweGDUQtGLRi1gDLAQowi9CIYnY8PDIwPGBkYnv5nYJAmpchmZGB4ik0cuw/+/8/CpQGn4f//ZxGrfmgBAJb0K63m3ULbAAAAAElFTkSuQmCC' class='w-5'></a></div>"
            $(this).append($(actions));
            editCategory("#editButton");
            deleteCategory("#deleteButton", delete_url);
        },
        mouseleave: function(){
            $(this).children(".actions").remove();
        }
    });

    $(this).on("change", "#updateCategory", function(){
        $(this).parent().parent().parent().parent().parent().parent().submit();
    });

    $("p.category").parent().click(function(){
        $("input.displayCategory").val($(this).text());
        $("label.displayCategory").text($(this).text());
    });

    $(".image-product").click(function(){
        var url = $(this).attr("href");
        if(confirm("Are you sure you want to delete this image?") == true){
            var options = {
                url: url,
                success: defaultResponse
            };
            $(this).ajaxSubmit(options); 
            return false;
        }
        else {
            return false;
        }
    })

    $("input:checkbox").on("click", function(){
        var $checkbox = $(this);
        if($checkbox.is(":checked")) {
            var input = "input:checkbox[name='" + $checkbox.attr("name") + "']";
            $(input).prop("checked", false);
            $checkbox.prop("checked", true);
        } else {
            $checkbox.prop("checked", false);
        }
    });
})

function editCategory(event){
    $(event).click(function(){
        var category = $(this).parent().parent().find("p.category").text();
        var category_id = $(this).parent().parent().find("p.category").attr("data-id");
        $(this).parent().parent().find("p.category").replaceWith("<input type='text' name='category' value='" + category + "' class='p-0.5 outline-none' id='updateCategory'> <input type='hidden' name='category_id' value='" + category_id + "'>" );
    });
}

function deleteCategory(event, url){
    $(event).click(function(){
        if(confirm("Are you sure you want to delete this category?") == true){
            var options = {
                url: url,
                success: showResponse
            };
            $(this).ajaxSubmit(options); 
            return false;
        }
        else {
            return false;
        }
    });
}

function showResponse(response){ 
    var obj = JSON.parse(response);
    var html_string = "";
    for(var i = 0; i < obj.categories.length; i++){
        html_string += "<li class='flex relative p-1 hover:bg-gray-200 hover:rounded category'>";
        html_string += "<p class='mr-5 category' data-id='" + obj.categories[i].id + "'>" + obj.categories[i].category + "</p></li>";
    }
    $("#selectCategory").html(html_string);
    $("#response").html("<p class='text-md text-green-900'>" + obj.response + "</p>");
} 

function defaultResponse(response){
    var obj = JSON.parse(response);
    $("#response").html("<p class='text-md text-green-900'>" + obj.response + "</p>");
    window.location.href = base_url + "dashboard/products";
}