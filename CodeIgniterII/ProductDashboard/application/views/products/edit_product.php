
	<div class="wrapper">
		<div class="product-content">
            <h2 class="content-header">Edit Product #<?= $product['id'] ?></h2>
            <a href="<?= base_url(); ?>dashboard" class="contentBtn">Return to Dashboard</a>
			<div class="errors">
<?php if($this->session->flashdata('errors')){
        foreach($this->session->flashdata('errors') as $value){ ?>
            <p><?= $value ?></p>
<?php }} ?>
			</div>
			<div class="success">
<?php if($this->session->flashdata('success')){ ?>
				<p><?= $this->session->flashdata('success') ?></p>
<?php } ?>
			</div>
			<form action="<?= base_url(); ?>products/edit/validate/<?= $product['id'] ?>" method="post">
				<input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>"/>
				<div class="input-fields">
					<label for="title">Name: </label>
					<input type="text" name="title" id="title" value="<?= $product['title'] ?>">
				</div>
				<div class="input-fields">
					<label for="description">Description: </label>
					<textarea name="description" id="description"><?= $product['description'] ?></textarea>
				</div>
				<div class="input-fields">
					<label for="price">Price: </label>
					<input type="text" name="price" id="price" value="<?= $product['price'] ?>">
				</div>
				<div class="input-fields">
					<label for="inventory_count">Inventory Count: </label>
					<input type="number" name="inventory_count" id="inventory_count" min="0" value="<?= $product['inventory_count'] ?>">
				</div>
                <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
				<input class="loginBtn" type="submit" value="Save">
			</form>
		</div>
	</div>
</body>
</html>