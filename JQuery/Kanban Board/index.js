$(document).ready(function() {
    $(function() {
        $("#sortableList1, #sortableList2, #sortableList3 , #sortableList4, #sortableList5, #sortableList6").sortable({
            connectWith: ".connected-list",
        }).disableSelection();
    });
})