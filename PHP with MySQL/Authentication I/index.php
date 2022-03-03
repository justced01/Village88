<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="style.css" type="text/css">
</head>
<body>
    <div class="wrapper">
        <h2>Login</h2>
<?php if(isset($_SESSION['errors'])){ 
    foreach($_SESSION['errors'] as $error){ ?>
        <p class="error"><?= $error; ?></p>
<?php } unset($_SESSION['errors']); } ?>
<?php if(isset($_SESSION['success_msg'])){ ?>
        <p class='success'><?= $_SESSION['success_msg']; ?></p>
<?php unset($_SESSION['success_msg']); } ?>
        <form method="post" action="process.php" class="login-form">
            <input type="text" name="email" placeholder="Email">
            <input type="password" name="password" placeholder="Password">
            <input type="hidden" name="action" value="login">
            <input type="submit" value="Login" class="login-btn">
            <a href="register.php">Register</a>
            <a href="forgot-pass.php">Forgot Password</a>
        </form>
    </div>
</body>
</html>