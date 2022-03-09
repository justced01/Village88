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
})