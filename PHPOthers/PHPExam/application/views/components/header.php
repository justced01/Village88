<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<title><?= $header['title'] ?></title>
	<link rel="stylesheet" href="<?= base_url('./assets/css/style.css') ?> ">
</head>
<body>
	<header>
		<nav class="left-nav">
			<h1><a href="#title">E-Commerce</a></h1>
<?php if($header['status'] === 'active'){ ?>
			<a href="<?= base_url(); ?>dashboard">Dashboard</a>
			<a href="<?= base_url(); ?>store">Store</a>
			<a href="<?= base_url(); ?>profile">Profile</a>
<?php } ?>
		</nav>
		<nav class="right-nav">
			<a href="<?= base_url(); ?><?= $header['anchor'] ?>"><?= $header['userBtn'] ?></a>
		</nav>
	</header>