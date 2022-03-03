<body>
	<header>
		<h1>Newbie's Clothing </h1>
		<div class="cart">
		<p><a href="<?= base_url('/carts/checkout'); ?>">Cart(<?= $index['cart'] ?>)</a></p>
		</div>
	</header>
	<div class="wrapper">
		<h2>New Arrivals</h2>
		<p class="error"><?= $this->session->flashdata('error') ?></p>
		<p class="success"><?= $this->session->flashdata('success') ?></p>
<?php foreach ($index['items'] as $item){ ?>
		<form action="<?= base_url('/carts/insert') ?>" method="post">
			<p><img src="<?= base_url('assets/img/'. $item['filename']) ?>" alt="<?= $item['description'] ?>"></p>
			<label class="item-title" for="tshirt"><?= $item['title'] . ' $' . $item['price'] ?></label>
			<label class="description" for="tshirt"><?= $item['description'] ?></label>
			<div class="input-group">
				<input type="number" name="quantity" min="0" max="50" placeholder="0">
				<input type="hidden" name="item" value="<?= $item['id'] ?>"> 
				<input type="submit" value="Buy">	
			</div>
		</form>
<?php } ?>
	</div>
