<body>
	<header>
		<h1>Newbie's Clothing </h1>
		<div class="cart">
		<p><a href="<?= base_url('/carts/checkout'); ?>">Cart(<?= $index['cart'] ?>)</a></p>
		</div>
	</header>
	<div class="wrapper">
		<h2>New Arrivals</h2>
<?php if($this->session->flashdata('errors')){ 
	foreach($this->session->flashdata('errors') as $error){ ?>
		<p class="error"><?= $error ?></p>
<?php }} ?>
		<p class="success"><?= $this->session->flashdata('success') ?></p>
<?php foreach($index['items'] as $item){ ?>
		<?= form_open('carts/insert'); ?>
			<p><img src="<?= base_url('assets/img/'. $item['filename']) ?>" alt="<?= $item['description'] ?>"></p>
			<label class="item-title" for="<?= $item['title'] ?>"><?= $item['title'] . ' $' . $item['price'] ?></label>
			<label class="description" for="<?= $item['description'] ?>"><?= $item['description'] ?></label>
			<div class="input-group">
				<input type="number" name="quantity" min="0" max="50" placeholder="0" class="quantity">
				<input type="hidden" name="item" value="<?= $item['id'] ?>"> 
				<input type="submit" value="Buy">	
			</div>
		</form>
<?php } ?>
	</div>
