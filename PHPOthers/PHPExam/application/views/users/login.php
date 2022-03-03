
    <div class="wrapper">
        <main class="login-wrapper">
            <h2>Welcome Back</h2>
            <p>Enter your credentials to login.</p>
<?php $this->load->view('partials/flash_messages') ?>
            <form action="users/validate_login" method="post" class="login-form">
                <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
                <div class="input-fields">
                    <label for="email">Email address: </label>
                    <input type="text" name="email" class="email-input" placeholder="Enter your email address" autocomplete="off">
                </div>
                <div class="input-fields">
                    <label for="password">Password: </label>
                    <input type="password" name="password" class="password-input" placeholder="Enter your password" autocomplete="off">
                </div>
                <input type="submit" value="Login">
            </form>
            <footer class="login-footer">
                <p>Forgot your password? <a href="reset">Click here</a></p>
                <p>Don't have an account yet? <a href="register">Register here</a></p>
            </footer>
        </main>
    </div>
</body>
</html>