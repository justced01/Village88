function generateData(result){
    var array = [];
    for (var i = 0; i < result.length; i++){
        array.push({label: result[i].month, y: result[i].total_cost});
    }
    return array;
}

$(document).ready(function(){
    var result = JSON.parse(data);
    $(function(){
        var base_url = window.location.origin;
        $("#start_datepicker").datepicker({
            showOn: "button",
            buttonImage: base_url + "/ClientBilling/assets/img/calendar_icon.png",
            buttonImageOnly: true,
            buttonText: "Select start date"
        });
        $("#end_datepicker").datepicker({
            showOn: "button",
            buttonImage: base_url + "/ClientBilling/assets/img/calendar_icon.png",
            buttonImageOnly: true,
            buttonText: "Select end date"
        });
    });
    var options = {
        animationEnabled: true,
        title: {
            text: "Client Billing - " + result[0].year            
        },
        axisY: {
            title: "Estimate Cost"
        },
        axisX: {
            title: "Months"
        },
        dataPointWidth: 50,
        data: [{
            type: "column",
            dataPoints: generateData(result)
        }]
    };
    $("#billingChart").CanvasJSChart(options);
});