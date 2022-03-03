
	<div class="wrapper">
		<div class="content">
			<h2>Edit Profile</h2>
			<h3>Please fill in your details below</h3>
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
			<form action="<?= base_url() ?>edit/validate" method="post">
				<input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>"/>
				<div class="input-fields">
					<label for="email">Email address: </label>
					<input type="text" name="email" value="<?= $profile['email'] ?>" id="email">
				</div>
				<div class="input-fields">
					<label for="firstname">First name: </label>
					<input type="text" name="first_name" value="<?= $profile['first_name'] ?>" id="firstname">
				</div>
				<div class="input-fields">
					<label for="lastname">Last name: </label>
					<input type="text" name="last_name" value="<?= $profile['last_name'] ?>"id="lastname">
				</div>
                <input type="hidden" name="action" value="form1">
                <input class="loginBtn" type="submit" value="Save">
			</form>
            <form action="<?= base_url() ?>edit/validate" method="post">
				<input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>"/>
				<div class="input-fields">
					<label for="password">Old Password: </label>
					<input type="password" name="old_password" id="old_password">
				</div>
				<div class="input-fields">
					<label for="password">New Password: </label>
					<input type="password" name="password" id="password">
				</div>
				<div class="input-fields">
					<label for="confirm_password">Confirm Password: </label>
					<input type="password" name="confirm_password" id="confirm_password">
				</div>
                <input type="hidden" name="action" value="form2">
				<input class="loginBtn" type="submit" value="Save">
			</form>
		</div>
	</div>
</body>
</html>