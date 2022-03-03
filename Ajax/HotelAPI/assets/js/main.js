$(document).ready(function(){
    $(function(){
        var dateFormat = "mm/dd/yy",
        from = $("#from")
        .datepicker({
            defaultDate: "+1w",
            changeMonth: true,
            numberOfMonths: 1
        })
        .on("change", function(){
            to.datepicker("option", "minDate", getDate(this));
        }),
        to = $("#to").datepicker({
            defaultDate: "+1w",
            changeMonth: true,
            numberOfMonths: 1
        })
        .on("change", function(){
            from.datepicker("option", "maxDate", getDate(this));
        });

        function getDate(element) {
            var date;
            try {
                date = $.datepicker.parseDate(dateFormat, element.value);
            } catch(error){
                date = null;
            }
            return date;
        }
    });
    $('form').submit(function(){
        $('h1').show('slow');
        $('#start').text($('#from').val());
        $('#end').text($('#to').val());
        $.post($(this).attr('action'), $(this).serialize(), function(res){
            console.log(res);
            var html_string = "";
            for(var i = 0; i < res.data.length; i++){
                html_string += "<h2>Hotel Name: " + res.data[i].name + "</h2>";
                html_string += "<p>Phone Numbers: " + res.data[i].phoneNumbers + "</p>";
                for(var j = 0; j < res.data[i].amenities.length; j++){
                    html_string += "<ul><li>" + res.data[i].amenities[j].formatted + "</li></ul>";
                }
            }
            $('#results').html(html_string);
        }, 'json');
        return false;   // don't forget, without this, the page will refresh
    });
});