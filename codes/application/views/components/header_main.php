<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
    <script src="https://malsup.github.io/jquery.form.js"></script> 
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="<?= base_url(); ?>assets/js/main.js"></script>
    <script src="<?= base_url(); ?>assets/js/ajax.js"></script>
    <script src="<?= base_url(); ?>assets/js/tailwindConfig.js"></script>
    <!-- jQuery Modal -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
	<title><?= $header['title'] ?></title>
	<link rel="stylesheet" href="<?= base_url(); ?>assets/css/style.css">
</head>
<body>
	<header class="w-full px-14 py-2 tablet:px-8 mobile:px-4 flex justify-between border-b border-gray-300 drop-shadow-md bg-[#F5F5F5]">
		<nav class="">
			<h1><a href="<?= base_url(); ?>products" class="text-xl px-5 tablet:text-lg mobile:text-base font-normal uppercase">Newbie Merch</a></h1>
		</nav>
<?php if(isset($header['logged_in'])){ ?>
		<nav class="">
			<a href="<?= base_url(); ?>carts" class="px-5 tablet:text-lg mobile:text-base font-normal">Shopping Cart (5)</a>
			<a href="<?= base_url(); ?>logout" class="px-5 tablet:text-lg mobile:text-base font-normal">logout</a>
		</nav>
<?php } ?>
	</header>