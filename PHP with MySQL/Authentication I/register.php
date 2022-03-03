<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
    <link rel="stylesheet" href="style.css" type="text/css">
</head>
<body>
    <div class="wrapper">
        <h2>Register</h2>
<?php if(isset($_SESSION['errors'])){ 
    foreach($_SESSION['errors'] as $error){ ?>
        <p class="error"><?= $error; ?></p>
<?php } unset($_SESSION['errors']); } ?>
        <form method="post" action="process.php" class="register-form">
            <input type="text" name="firstname" placeholder="First Name">
            <input type="text" name="lastname" placeholder="Last Name">
            <input type="text" name="contact_num" placeholder="Contact Number">
            <input type="text" name="email" placeholder="Email">
            <input type="password" name="password" placeholder="Password">
            <input type="password" name="confirm_password" placeholder="Confirm Password">
            <input type="hidden" name="action" value="register">
            <input type="submit" value="Register" class="register-btn">
            <a href="index.php">Already have an account?</a>
        </form>
    </div>
</body>
</html>