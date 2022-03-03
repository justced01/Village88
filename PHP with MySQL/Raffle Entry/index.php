<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Raffle Entry</title>
    <link rel="stylesheet" href="style.css" type="text/css">
</head>
<body>
    <form action="process.php" method="post">
        <label for="contact_num">Contact Number</label>
        <input type="text" name="contact_num" placeholder="Enter your Contact Number">
        <input type="hidden" name="submit" value="submit">
        <input type="submit" value="Submit">
<?php if(isset($_SESSION['errors'])){ 
    foreach($_SESSION['errors'] as $error){ ?>
        <p class="alert-message"><?= $error; ?></p>
<?php } unset($_SESSION['errors']); } ?>
    </form>
</body>
</html> 