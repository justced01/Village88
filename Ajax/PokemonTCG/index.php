<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <title>Pokemon TCG</title>
    <style>
        p, h5, .modal {
            text-align: center;
        }
        p img {
            margin: 10px;
            width: 15%;
        }

    </style>
    <script>
        $(document).ready(function(){
            var html_str = '<p>';
            $.get("https://api.pokemontcg.io/v2/cards?q=id:ex11", function(res){
                for(var i = 0; i < 100; i++){
                    html_str += "<a href='https://api.pokemontcg.io/v2/cards?q=id:" + res.data[i].id + "' data-bs-toggle='modal' data-bs-target='#staticBackdrop" + i + "'><img id='" + res.data[i].id + "'src=" + res.data[i].images.small + "></a>";
                    $("div.modal-header-" + i ).each(function(){
                        $(this).prepend("<h1 class='modal-title' id='staticBackdropLabel'>" + res.data[i].name + "</h1>");
                    });
                    $("div.modal-body-" + i).each(function(){
                        $(this).append("<img class='pokemon-img' id='" + res.data[i].id + "'src=" + res.data[i].images.small + ">");
                        $(this).append("<p>Types: ");
                        for(var j = 0; j < 2; j++){
                            $(this).append(res.data[j].types + ' ');
                        }
                        $(this).append("</p>");
                        if(res.data[i].hp != null){
                            $(this).append("<p>HP: " + res.data[i].hp + "</p>");
                        }
                        if(res.data[i].evolvesFrom != null){
                            $(this).append("<p>Evolves From: " + res.data[i].evolvesFrom + "</p>");
                        }
                    });
                }
                html_str += "</p>";
                $("#pokemon").html(html_str);
            }, "json");
        })
    </script>
</head>
<body>
<?php for($i = 0; $i < 100; $i++){ ?>
    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop<?= $i ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header-<?= $i ?>">
                </div>
                <div class="modal-body-<?= $i ?>">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
    <div id="pokemon">

    </div>
</body>
</html>
