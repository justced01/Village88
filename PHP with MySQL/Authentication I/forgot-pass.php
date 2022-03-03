<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link rel="stylesheet" href="style.css" type="text/css">
</head>
<body>
    <div class="wrapper">
        <h2>Forgot Password</h2>
<?php if(isset($_SESSION['errors'])){ 
    foreach($_SESSION['errors'] as $error){ ?>
        <p class="error"><?= $error; ?></p>
<?php } unset($_SESSION['errors']); } ?>
<?php if(isset($_SESSION['success_msg'])){ ?>
        <p class='success'><?= $_SESSION['success_msg']; ?></p>
<?php unset($_SESSION['success_msg']); } ?>
        <form action="process.php" method="post" class="forgot-pass-form">
            <input type="text" name="contact_num" placeholder="Contact Number">
            <input type="hidden" name="action" value="forgot">
            <input type="submit" value="Forgot Password" class="register-btn">
            <a href="index.php">Back to login?</a>
        </form>
    </div>
</body>
</html>