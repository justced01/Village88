
	<div class="wrapper">
		<h1><img src="https://img.icons8.com/ios-filled/50/000000/gift--v1.png"> My Wishlist</h1>
		<form action="items/create" method="post" class="add-form">
			<input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
			<label for="">List new item: </label><input type="text" name="item" id=""><input type="submit" value="Add">
		</form>
		<div id="item-list">
<?php $this->load->view('partials/flash_messages') ?>
<?php foreach($items as $item){ ?>
			<form action="items/update/<?= $item['id'] ?>" method="post" class="item-form">
				<input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
				<div class="checkbox-field">
					<label><input type="checkbox" class="item-check" name="item" value="<?= $item['item'] ?>"> <?= $item['item'] ?></label>
				</div>
				</form>
<?php } ?>
		</div>
	</div>
</body>
</html>