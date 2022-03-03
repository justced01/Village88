
	<div class="wrapper">
		<h1><img src="https://img.icons8.com/ios-filled/50/000000/gift--v1.png"> My Wishlist</h1>
<?php $this->load->view('partials/flash_messages') ?>
		<form action="items/create" method="post" class="add-form">
			<input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
			<label for="">List new item: </label><input type="text" name="item" id=""><input type="submit" value="Add">
		</form>
		<div id="item-list">
		</div>
	</div>
</body>
</html>