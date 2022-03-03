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
    <title>Register</title>
    <link rel="stylesheet" href="./newbie_platform.css" type="text/css">
</head>
<body>
    <header class="header-top">
        <h2>Newbie <span>platform</span></h2>
    </header>
    <main>
        <header class="header-main">
            <h2>Create account</h2>
            <p>Get access to exclusive features by creating an account</p>
            <?= print_message(); ?>
        </header>
        <form action="process.php" method="post" class="register-form">
            <div class="input-fields">
                <label for="firstname">First name</label>
                <input type="text" name="firstname" placeholder="Your first name">
            </div>
            <div class="input-fields">
                <label for="lastname">Last name</label>
                <input type="text" name="lastname" placeholder="Your last name">
            </div>
            <div class="input-fields">
                <label for="email">E-mail</label>
                <input type="text" name="email" placeholder="Your email address">
            </div>
            <div class="input-fields">
                <label for="password">Password</label>
                <input type="password" name="password" placeholder="Password">
            </div>
            <div class="input-fields">
                <label for="cpassword">Confirm Password</label>
                <input type="password" name="cpassword" placeholder="Confirm Password">
            </div>
            <div class="form-actions">
                <input type="hidden" name="action" value="register">
                <input type="submit" value="Create my account" class="register-btn">
                <p>Already have an account? <a href="./index.php">Sign in</a></p>
            </div>
        </form>
    </main>
</body>
</html>