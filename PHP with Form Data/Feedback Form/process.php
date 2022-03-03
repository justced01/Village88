<?php
    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $course = $_POST['course'];
        $score = $_POST['score'];
        $reason = $_POST['reason'];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submitted Entry</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <div class="wrapper">
        <h1>Submitted Entry</h1>
        <p>Your Name (optional): <?= $name ?></p>
        <p>Course Title: <?= $course ?></p>
        <p>Given Score (1-10): <?= $score ?>pts</p>
        <p>Reason:</p>
        <p class="wrap"><?= $reason ?></p>
        <a href="./index.php"><input type="button" value="Return"></a>
    </div>
</body>
</html>