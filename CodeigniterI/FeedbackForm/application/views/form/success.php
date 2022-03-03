<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submitted Entry</title>
    <style>
        label, input, select {
            display: block;
            margin: 5px 0;
        }
        .wrapper {
            width: 20%;
            margin: 0 auto;
            padding: 20px;
            border: 3px solid #000;
            border-radius: 25px;
            font-family:  sans-serif;
        }
            h1 {
                text-align: center;
            }
            a {
                text-decoration: none;
            }
            .wrap {
                word-wrap: break-word;
            }
            span {
                font-weight: bold;
            }
    </style>
</head>
<body>
    <div class="wrapper">
        <h1>Submitted Entry</h1>
        <p><span>Your Name:</span> <?= $name ?></p>
        <p><span>Course Title:</span> <?= $course ?></p>
        <p><span>Given Score (1-10):</span> <?= $score ?>pts</p>
        <p><span>Reason:</span></p>
        <p class="wrap"><?= $reason ?></p>
        <a href="feedback"><input type="button" value="Return"></a>
    </div>
</body>
</html>