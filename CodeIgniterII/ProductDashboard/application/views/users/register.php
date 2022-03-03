
	<div class="wrapper">
		<div class="content">
			<h2>Register</h2>
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
			<form action="register/validate" method="post">
				<input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>"/>
				<div class="input-fields">
					<label for="email">Email address: </label>
					<input type="text" name="email" id="email">
				</div>
				<div class="input-fields">
					<label for="firstname">First name: </label>
					<input type="text" name="first_name" id="firstname">
				</div>
				<div class="input-fields">
					<label for="lastname">Last name: </label>
					<input type="text" name="last_name" id="lastname">
				</div>
				<div class="input-fields">
					<label for="password">Password: </label>
					<input type="password" name="password" id="password">
				</div>
				<div class="input-fields">
					<label for="confirm_password">Confirm Password: </label>
					<input type="password" name="confirm_password" id="confirm_password">
				</div>
				<input class="loginBtn" type="submit" value="Login">
			</form>
			<a href="login" >Already have an account? Login</a>
		</div>
	</div>
</body>
</html>