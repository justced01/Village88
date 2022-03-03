$(document).ready(function() {
    $('form').submit(function(event){
        event.preventDefault();
        var fname = $('#firstname').val();
        var lname = $('#lastname').val();
        var address = $('#address').val();
        var datepicker = $('#datepicker').val();

        if(fname == false){
            alert('Please enter your first name.');
        } else if(lname == false){
            alert('Please enter your last name.');
        } else if(address == false){
            alert('Please enter your address.');
        } else if(datepicker == false){
            alert('Please enter your preferred date.');
        } else {
            alert('Success, ' + fname + ' ' + lname + '! Your vaccination is reserved on ' + datepicker + '.');
        }
    });
    $( function() {
        $( "#datepicker" ).datepicker();
    });
})