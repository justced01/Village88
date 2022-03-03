<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Authentication</title>
	<link rel="stylesheet" href="<?= base_url('./assets/css/style.css') ?> ">
</head>
<body>
	<div class="wrapper">
		<form action="<?= base_url('create') ?>" method="post" class="signup-form">
			<fieldset>
				<legend>Sign Up</legend>
				<?= $this->session->flashdata('signup_errors') ?>
<?php if($this->session->flashdata('signup-success')){ ?>
				<p class="success"><?= $this->session->flashdata('signup-success') ?></p>
<?php } ?>
				<div class="input-fields">
					<label for="firstname">First name: </label>
					<input type="text" name="firstname">
				</div>
				<div class="input-fields">
					<label for="lastname">Last name: </label>
					<input type="text" name="lastname">
				</div>
				<div class="input-fields">
					<label for="email">Email: </label>
					<input type="email" name="email">
				</div>
				<div class="input-fields">
					<label for="contact_num">Contact number: </label>
					<input type="text" name="contactnum">
				</div>
				<div class="input-fields">
					<label for="password">Password: </label>
					<input type="password" name="password">
				</div>
				<div class="input-fields">
					<label for="cpassword">Confirm password: </label>
					<input type="password" name="cpassword">
				</div>
				<div class="action-group">
					<input type="hidden" name="action" value="create">
					<input type="submit" value="Submit" class="signupBtn">
				</div>
			</fieldset>
		</form>
		<form action="<?= base_url('login') ?>" method="post" class="login-form">
			<fieldset>
				<legend>Log In</legend>
				<?= $this->session->flashdata('login_errors') ?>
				<div class="input-fields">
					<label for="email">Email or Contact number: </label>
					<input type="text" name="email_contactnum" >
				</div>
				<div class="input-fields">
					<label for="password">Password</label>
					<input type="password" name="password">
				</div>
				<div class="action-group">
					<input type="hidden" name="action" value="login">
					<input type="submit" value="Submit" class="loginBtn">
				</div>
			</fieldset>
		</form>
	</div>
</body>
</html>