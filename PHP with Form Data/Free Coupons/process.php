<?php
    session_start();
    if(isset($_POST['submit'])){
        $_SESSION['form'] = 0;
        $_SESSION['coupon'] = 1;
        header('Location: ./index.php');
    }
    if(isset($_POST['reset'])){
        $_SESSION['customer'] = 10;
        $_SESSION['form'] = 1;
        $_SESSION['coupon'] = 0;
        header('Location: ./index.php');
    }
    if(isset($_POST['claim_again'])){
        $_SESSION['form'] = 1;
        $_SESSION['coupon'] = 0;
        header('Location: ./index.php');
    }
?>

