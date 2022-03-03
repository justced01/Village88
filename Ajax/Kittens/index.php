<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <title>Kittens</title>
    <script>
        $(document).ready(function(){
            $.get("https://fakerapi.it/api/v1/images?_quantity=100&_type=kittens", function(res){
                var html_str = '';
                for(var i = 0; i < res.data.length; i++){
                    html_str += "<p>" + res.data[i].title + '<img class="img" src="' + res.data[i].url + '" alt="' + res.data[i].title + '">';
                }
                html_str += "</p>";
                $("#kittens").html(html_str);
            }, "json");
        })
    </script>
    <style>
        h4 {
            font-family: sans-serif;
            text-align: center;
        }
        p {
            display: inline-block;
            width: 20%;
            margin: 10px;
            vertical-align: top;
            border: 1px solid red;
        }
        p img {
            width: 100%;
            object-fit: cover;
            display: block;
            margin: 0 auto;
        }
        #kittens {
            width: 80%;
            margin: 0 auto;
            text-align: center;
        }
    </style>
</head>
<body>
    <h4>Kittens</h4>
    <div id="kittens">
    </div>
</body>
</html>