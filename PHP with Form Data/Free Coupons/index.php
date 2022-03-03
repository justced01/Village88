<?php
    session_start();
    $random = rand(1000000, 9999999);
    if(!isset($_SESSION['customer'])){
        $_SESSION['customer'] = 10;
        $_SESSION['coupon'] = 0;
        $_SESSION['form'] = 1;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Free Coupons | Home</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <div class="wrapper">
        <h1>Welcome Customer!</h1>
        <p>We're giving away <span>free coupons</span> as token of appreciation</p>
        <?= $_SESSION['customer'] > 0 && $_SESSION['form'] == 1 ? "<p>for first " . $_SESSION['customer'] . " customer(s)</p>" : ''; ?>

<?php if($_SESSION['form'] == 1){ ?>
        <form action="process.php" method="post">
            <label for="name">Kindly type your name:</label>
            <input type="text" name="name">
            <input type="submit" value="Submit" name="submit" >
        </form>
<?php } ?>

<?php if($_SESSION['coupon'] == 1){ ?>
        <form action="process.php" method="post" class="container">
            <?= $_SESSION['customer'] > 0 ? "<p>50% Discount</p><h2>". $random . "</h2>" : "<h3>Sorry!</h3><h1>Unavailable</h1>"; ?>
            <input type="submit" value="Reset count" name="reset">
            <input type="submit" value="Claim again" name="claim_again">
        </form>
<?php 
        $_SESSION['customer'] -= 1;
        $_SESSION['form'] = 1; 
        $_SESSION['coupon'] = 0; 
    } 
?>
    </div>
</body>
</html>