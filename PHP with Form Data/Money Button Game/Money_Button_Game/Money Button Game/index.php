<?php
    session_start();
    if(!isset($_SESSION['money'])){
        $_SESSION['money'] = 500; 
        $_SESSION['chance'] = 10;
        $_SESSION['history'] = array(); // added
    }
    //session_destroy(); // don't call this function unless you're clearing session voluntarily for quick session reset

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Money Button Game</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <header>
        <h1>Bet your Luck</h1>
        <h3>Your Money: <?= $_SESSION['money'] ?></h3>
            <button href="./index.php">Reset Game</button>
        <p>Chances Left: <?= $_SESSION['chance'] >= 0 ? $_SESSION['chance'] : 0 ?></p>
    </header>
    <main>
        <section>
            <form method="post" action="process.php">
                <h2>Low Risk</h2>
                <input type="hidden" name="low_risk" value="Low Risk">
                <input type="submit" name="low_bet" value="Bet">
                <p>by -25 up to 100</p>
            </form>
            <form method="post" action="process.php">
                <h2>Moderate Risk</h2>
                <input type="hidden" name="mod_risk" value="Moderate Risk">
                <input type="submit" name="mod_bet" value="Bet">
                <p>by -100 up to 1000</p>
            </form>
            <form method="post" action="process.php">
                <h2>High Risk</h2>
                <input type="hidden" name="high_risk" value="High Risk">
                <input type="submit" name="high_bet" value="Bet">
                <p>by -500 up to 2500</p>
            </form>
            <form method="post" action="process.php">
                <h2>Severe Risk</h2>
                <input type="hidden" name="severe_risk" value="Severe Risk">
                <input type="submit" name="severe_bet" value="Bet">
                <p>by -3000 up to 5000</p>
            </form>
        </section>
        <h3>Game Host:</h3>
        <div class="game-host">
            <p>[ <?= date("Y/m/d") . ' ' . date("h:iA"); ?> ] Welcome to Money Button Game, risk taker! All you need to do is to push buttons to try your luck. You have free 10 chances with initial money of 500. Choose wisely and good luck!.</p>
<?php if(isset($_SESSION['history'])){ ?>
    <?php foreach($_SESSION['history'] as $message){ ?>
            <p class="color_<?= $_SESSION['color'] ?>"><?= $message; ?></p>
    <?php } ?>   
<?php } ?>
        </div>
    </main>
</body>
</html>

