<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Raffle Draw</title>
	<link rel="stylesheet" href="<?= base_url('./assets/css/style.css') ?> ">
</head>
<body>
	<div class="wrapper">
		<h2>There are <?= $this->session->userdata('count') ?> lucky winners selected</h2>
		<h1><?= $ticket ?></h1>
		<form action="process" method="post">
			<input type="hidden" name="action" value="submit">
			<input type="submit" value="Pick more">
			<input type="submit" name="reset" value="Reset">
		</form>
	</div>
</body>
</html>