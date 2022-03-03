<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Countdown</title>
    <style>
        body {
            width: 100%;
            margin: 100px auto;
            font-family: sans-serif;
            font-size: 50px;
            text-align: center;
        }
        span {
            padding: 5px;
            border: 4px solid #000;
        }
    </style>
</head>
<body>
    <h1>Countdown to New Year!</h1>
    <p><span><?= $day ?></span> Days</p>
    <p><span><?= $hours ?></span> hours, <span><?= $minutes ?></span> minutes, <span><?= $seconds ?></span> seconds</p>
</body>
</html>