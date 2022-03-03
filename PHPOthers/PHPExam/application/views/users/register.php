    
    <div class="wrapper">
        <main class="register-wrapper">
            <h2>Create new account</h2>
            <p>Enter the required credentials.</p>
<?php $this->load->view('partials/flash_messages') ?>
            <form action="users/validate_register" method="post" class="register-form">
                <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
                <div class="input-fields">
                    <label for="first_name">First name: </label>
                    <input type="text" name="first_name" class="name-input" placeholder="Enter your first name" autocomplete="off">
                </div>
                <div class="input-fields">
                    <label for="last_name">Last name: </label>
                    <input type="text" name="last_name" class="name-input" placeholder="Enter your last name" autocomplete="off">
                </div>
                <div class="input-fields">
                    <label for="email">Email address: </label>
                    <input type="text" name="email" class="email-input" placeholder="Enter your email address" autocomplete="off">
                </div>
                <div class="input-fields">
                    <label for="password">Password: </label>
                    <input type="password" name="password" class="password-input" placeholder="Enter your password" autocomplete="off">
                </div>
                <div class="input-fields">
                    <label for="confirm_password">Confirm Password: </label>
                    <input type="password" name="confirm_password" class="password-input" placeholder="Confirm password" autocomplete="off">
                </div>
                <input type="submit" value="Register">
            </form>
            <footer class="register-footer">
                <p>Already have an account? <a href="login">Login here</a></p>
            </footer>
        </main>
    </div>
</body>
</html>