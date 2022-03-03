<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Product Dashboard">
    <meta name="author" content="Cedrick Dela Carcel">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
	<title><?= $header['title'] ?></title>
	<link rel="stylesheet" href="<?= base_url('/assets/css/style.css') ?> ">
	<script src="<?= base_url('/assets/js/validation.js') ?>"></script>
</head>
<body>
	<header>
		<h1>V88 Merchandise</h1>
<?php if(isset($header['page']) && $header['page'] === 'dashboard'){ ?>
		<nav>
			<a href="<?= base_url() ?>dashboard">Dashboard</a>
			<a href="<?= base_url() ?>users/edit">Profile</a>
		</nav>
<?php } ?>
		<a href="<?= $header['link'] ?>" class="headerBtn"><?= $header['anchor'] ?></a>
	</header>