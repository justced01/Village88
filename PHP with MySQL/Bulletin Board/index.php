<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index Page</title>
    <link rel="stylesheet" href="style.css" type="text/css">
</head>
<body>
    <div class="wrapper">
        <h1>Welcome to Bulletin Board</h1>
<?php if(isset($_SESSION['errors'])){ 
    foreach($_SESSION['errors'] as $error){ ?>
        <p class="alert-message"><?= $error; ?></p>
<?php } unset($_SESSION['errors']); } ?>
<?php if(isset($_SESSION['success'])){ ?>
        <p><?= $_SESSION['success']; ?></p>
<?php unset($_SESSION['success']); } ?>
        <form action="process.php" method="post">
            <div class="input">
                <label for="subject">Subject:</label>
                <input type="text" name="subject">
                <label for="details">Details:</label>
                <textarea name="details"></textarea>
            </div>
            <div class="button">
                <input type="submit" value="Add">
                <input type="hidden" name="add" value="Add">
                <a href="main.php"><input type="button" value="Skip"></a>
            </div>
        </form>
    </div>
</body>
</html>