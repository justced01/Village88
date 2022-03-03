<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link rel="stylesheet" href="style.css" type="text/css">
</head>
<body>
    <div class="wrapper">
        <h2>Welcome back!</h2>
        <p class="welcome-msg">Welcome <?= $_SESSION['firstname'] . ' ' . $_SESSION['lastname'] ?>! </p>
        <a href="index.php" class="logout-btn">Logout</a>
    </div>
</body>
</html>