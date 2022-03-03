
	<div class="wrapper">
<?php if(isset($orders)){ ?>
		<h1>Order Queue:</h1>
		<h2>(Without Ajax)</h2>
<?php foreach($orders as $order){ ?>
		<div class="order-card">
			<h2><?= $order['id'] ?></h2>
			<p><?= $order['order_info'] ?></p>
		</div>
<?php }} ?>
		<h1>Order Queue:</h1>
		<h2>(With Ajax)</h2>
		<div id="orders">
		</div>
		<form action="orders/process_order" method="post">
			<p><?php $this->load->view('partials/flash_messages'); ?></p>
			<input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
			<input type="text" name="order">
			<input type="submit" value="Submit Order">
		</form>
	</div>
</body>
</html>