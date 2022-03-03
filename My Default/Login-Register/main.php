<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Page</title>
    <link rel="stylesheet" href="./style.css" type="text/css">
</head>
<body>
    <div class="wrapper">
        <header class="header-top-main">
            <h2 class="h-title">Blog</h2>
            <div class="user-nav">
                <h2>Welcome <?= $_SESSION['firstname'] . ' ' . $_SESSION['lastname'] ; ?>!</h2>
                <a href="./process.php">Sign out</a>
            </div>
        </header>
    </div>
</body>
</html>