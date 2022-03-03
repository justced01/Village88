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
    <style>
        form input {
            display: block;
            margin: 5px 0;
        }
        .error {
            color: red;
        }
        .success {
            color: green;
        }
    </style>
</head>
<body>
    <?= print_message(); ?>
    <form action="process.php" method="post">
        <h2>Register</h2>
        Firstname: <input type="text" name="firstname" >
        Lastname: <input type="text" name="lastname" >
        Email: <input type="text" name="email" >
        Password: <input type="password" name="password" >
        Confirm Password: <input type="password" name="cpassword" >
        <input type="hidden" name="action" value="register">
        <input type="submit" value="Submit" >
    </form>
    <form action="process.php" method="post">
        <h2>Login</h2>
        Email: <input type="text" name="email" >
        Password: <input type="password" name="password" >
        <input type="hidden" name="action" value="login">
        <input type="submit" value="Login" >
    </form>
</body>
</html>