
    <div class="container w-1/4 mx-auto mt-40 p-5 border rounded border-slate-300 shadow-md">
        <div class="my-2 text-center">
            <h2 class="text-3xl font-normal text-gray-700 uppercase">Welcome Back</h2>
            <p>Enter your credentials to login.</p>
        </div>
<?php $this->load->view('partials/flash_messages'); ?>
        <form action="<?= base_url(); ?>users/login_validate" method="post" class="my-8">
            <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
            <div class="mb-4">
                <label for="email" class="block w-full mr-2 text-gray-700 text-sm font-bold mb-2">Email address: </label>
                <input type="text" name="email" class="email-input shadow appearance-none border rounded w-full pl-10 py-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Enter your email address" autocomplete="off">
            </div>
            <div class="mb-4">
                <label for="password" class="block w-full mr-2 text-gray-700 text-sm font-bold mb-2">Password: </label>
                <input type="password" name="password" class="password-input shadow appearance-none border rounded w-full pl-10 py-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Enter your password" autocomplete="off">
            </div>
            <div class="mb-4">
                <input type="submit" value="Login" class="shadow appearance-none border rounded w-full py-2 px-3 text-white rounded bg-gray-700 hover:bg-gray-900 leading-tight focus:outline-none focus:shadow-outline transition cursor-pointer">
            </div>
        </form>
        <footer class="text-right">
            <p>Forgot your password? <a href="reset" class="text-slate-500 hover:text-slate-900">Click here</a></p>
            <p>Don't have an account yet? <a href="register" class="text-slate-500 hover:text-slate-900">Register here</a></p>
        </footer>
    </div>
</body>
</html>