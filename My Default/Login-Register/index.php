<?php 
    session_start();
    function print_message(){
        if(isset($_SESSION['errors'])){
            foreach($_SESSION['errors'] as $error){
                echo '<p class="error">' . $error . "</p>";
            } 
            unset($_SESSION['errors']); 
        }
        else if(isset($_SESSION['success'])){
            echo '<p class="success">' . $_SESSION['success'] . "</p>";
            unset($_SESSION['success']); 
        }
    } 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./style.css" type="text/css">
</head>
<body>
    <header class="header-top">
        <h2>Newbie <span>platform</span></h2>
    </header>
    <main>
        <header class="header-main">
            <h2>Login</h2>
            <p>Welcome to Newbie Platform. Please input your login credentials below to start using the site.</p>
            <?= print_message(); ?>
        </header>
        <form action="process.php" method="post" class="login-form">
            <div class="input-fields">
                <label for="email">E-mail</label>
                <input type="text" name="email" placeholder="Your email address">
            </div>
            <div class="input-fields">
                <label for="password">Password</label>
                <input type="password" name="password" placeholder="Password">
            </div>
            <p class="link"><a href="./forgotpass.php" class="forgotpass-link">Forgot password?</a></p>
            <div class="form-actions">
                <input type="hidden" name="action" value="login">
                <input type="submit" value="Login" class="login-btn">
                <p>Don't have an account? <a href="./register.php">Sign up</a></p>
            </div>
        </form>
    </main>
</body>
</html>