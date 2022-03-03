
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Index</title>
	<link rel="stylesheet" href="<?= base_url('./assets/css/style.css') ?> ">
</head>
<body>
	<header>
		<h1>Bet your Luck</h1>
        <h3>Your Money: <?= $this->session->userdata('money') >= 0 ? $this->session->userdata('money') : 0 ?></h3>
        <h3>Your Chances: <?= $this->session->userdata('chance') >= 0 ? $this->session->userdata('chance') : 0 ?></h3>
        <form method="post" action="reset" class="reset">
            <input type="hidden" name="action" value="reset">
            <input type="submit" value="Reset Game">
        </form>
	</header>
	<main>
        <section>
            <form method="post" action="process">
                <h2>Low Risk</h2>
                <input type="hidden" name="action" value="low">
                <input type="submit" value="Bet">
                <p>by -25 up to 100</p>
            </form>
            <form method="post" action="process">
                <h2>Moderate Risk</h2>
                <input type="hidden" name="action" value="moderate">
                <input type="submit" value="Bet">
                <p>by -100 up to 1000</p>
            </form>
            <form method="post" action="process">
                <h2>High Risk</h2>
                <input type="hidden" name="action" value="high">
                <input type="submit" value="Bet">
                <p>by -500 up to 2500</p>
            </form>
            <form method="post" action="process">
                <h2>Severe Risk</h2>
                <input type="hidden" name="action" value="severe">
                <input type="submit" value="Bet">
                <p>by -3000 up to 5000</p>
            </form>
        </section>
        <h3>Game Host:</h3>
        <div class="game-host">
            <p>[ <?= date("Y/m/d") . ' ' . date("h:iA"); ?> ] Welcome to Money Button Game, risk taker! All you need to do is to push buttons to try your luck. You have free 10 chances with initial money of 500. Choose wisely and good luck!.</p>
<?php $messages = $this->session->userdata('message'); 
    $timestamp = "[ " . date("Y/m/d") . ' ' . date("h:iA") . " ]";
    foreach($messages as $message){ 
        if($message['chance'] >= 0 && $message['money'] >= 0){
?>
            <p class="color_<?= $message['value'] > 0 ? 1 : 0 ?>"><?= $timestamp ?> You pushed "<?= $message['name'] ?>". Value is <?= $message['value'] ?>. Your current money now is <?= $message['money'] ?> with <?= $message['chance'] ?> chance(s) left.</p>
        <?php } else { ?>
            <p>Game over!</p>
     <?php } ?>
<?php } ?>
        </div>
    </main>
</body>
</html>

