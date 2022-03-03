
	<div class="wrapper">
		<h1>Order Queue:</h1>
		<h2>(With Ajax)</h2>
		<div id="orders">
		</div>
		<form action="orders/process_order" method="post" class="order-form">
<?php $this->load->view('partials/flash_messages'); ?>
			<input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
			<input type="text" name="order" placeholder="Type your order here">
			<input type="submit" value="Submit Order">
		</form>
	</div>
</body>
</html>