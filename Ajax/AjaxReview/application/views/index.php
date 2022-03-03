
	<div class="wrapper">
		<h1>Ajax Notes</h1>
		<div id="form-notes">

		</div>
		<h3>Add a new notes</h3>
<?php $this->load->view('partials/flash_messages'); ?>
		<form action="create" method="post" class="create-form">
			<input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
			<div class="input-fields">
				<label for="">Title: </label>
				<input type="text" name="title">
			</div>
			<div class="input-fields">
				<label for="">Description: </label>
				<textarea name="content" placeholder="Enter notes here..."></textarea>
			</div>
			<input type="submit" value="Submit">
		</form>
	</div>
</body>
</html>