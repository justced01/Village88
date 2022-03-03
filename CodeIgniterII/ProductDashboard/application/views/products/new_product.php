
	<div class="wrapper">
		<div class="product-content">
            <h2 class="content-header">Add a new Product</h2>
            <a href="dashboard" class="contentBtn">Return to Dashboard</a>
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
			<form action="new/validate" method="post">
				<input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>"/>
				<div class="input-fields">
					<label for="title">Name: </label>
					<input type="text" name="title" id="title">
				</div>
				<div class="input-fields">
					<label for="description">Description: </label>
					<textarea name="description" id="description"></textarea>
				</div>
				<div class="input-fields">
					<label for="price">Price: </label>
					<input type="text" name="price" id="price">
				</div>
				<div class="input-fields">
					<label for="inventory_count">Inventory Count: </label>
					<input type="number" name="inventory_count" id="inventory_count" min="0">
				</div>
				<input class="loginBtn" type="submit" value="Create">
			</form>
		</div>
	</div>
</body>
</html>