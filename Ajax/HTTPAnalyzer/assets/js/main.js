$(document).ready(function() {
    $('form').submit(function() {
        $.post($(this).attr('action'), $(this).serialize(), function(res){
            var tags = countTags(res);
            var html_string = "";
            html_string += "<div class='http-table'>";
            html_string += "<h2>HTTP Tags analyzer</h2>";
            html_string += "<table>";
            html_string += "<tr><th>HTML Tags</th><th>number of appearances</th></tr>";
            for(var key in tags){
                html_string += "<tr><td>" + key + "</td>";
                html_string += "<td>" + tags[key] + "</td></tr>";
            }
            html_string += "</table>";
            html_string += "</div>";
            html_string += "<div class='http-response'>";
            html_string += "<h2>HTTP Response</h2>";
            html_string += "<textarea>" + res + "</textarea>";
            html_string += "</div>";

            $('#display').html(html_string);
        });
        return false;
    });
});

function countTags(tags){
    var tagObj = {
        meta: $(tags).filter("meta").length,
        div: $(tags).find("div").length,
        p: $(tags).find("p").length,
        a: $(tags).find("a").length,
        img: $(tags).find("img").length,
        ul: $(tags).find("ul").length,
        li: $(tags).find("li").length,
        h1: $(tags).find("h1").length,
        h2: $(tags).find("h2").length,
        h3: $(tags).find("h3").length
    };
    return tagObj;
}


