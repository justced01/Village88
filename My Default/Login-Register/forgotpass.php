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
    <title>Forgot Password</title>
    <link rel="stylesheet" href="./style.css" type="text/css">
</head>
<body>
    <header class="header-top">
        <h2>Newbie <span>platform</span></h2>
    </header>
    <main>
        <header class="header-main">
            <h2>Forgot Password</h2>
            <p>Please enter your contact number.</p>
            <?= print_message(); ?>
        </header>
        <form action="process.php" method="post" class="forgotpass-form">
            <div class="input-fields">
                <label for="contactnum">Contact number</label>
                <input type="text" name="contactnum" placeholder="Your contact number">
            </div>
            <div class="form-actions">
                <input type="hidden" name="action" value="forgot">
                <input type="submit" value="Reset Password" class="login-btn">
                <p>Don't have an account? <a href="./register.php">Sign up</a></p>
            </div>
        </form>
    </main>
</body>
</html>