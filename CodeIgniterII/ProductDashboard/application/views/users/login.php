
	<div class="wrapper">
		<div class="content">
			<h2>Login</h2>
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
			<form action="login/validate" method="post">
				<input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>"/>
				<div class="input-fields">
					<label for="email">Email address: </label>
					<input type="text" name="email" id="email">
				</div>
				<div class="input-fields">
					<label for="password">Password: </label>
					<input type="password" name="password" id="password">
				</div>
				<input class="loginBtn" type="submit" value="Login">
			</form>
			<a href="register">Don't have an account yet? Register</a>
		</div>
	</div>
</body>
</html>