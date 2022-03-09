
    <div class="container w-1/4 mx-auto mt-20 p-5 border rounded border-slate-300 shadow-md">
        <div class="my-2 text-center">
            <h2 class="text-3xl font-normal text-gray-700 uppercase">Create new account</h2>
            <p>Enter the required credentials.</p>
        </div>
<?php $this->load->view('partials/flash_messages'); ?>
        <form action="<?= base_url(); ?>users/register_validate" method="post" class="my-8">
            <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
            <div class="mb-4">
                <label for="first_name" class="block w-full mr-2 text-gray-700 text-sm font-bold mb-2">First name: </label>
                <input type="text" name="first_name" class="name-input shadow appearance-none border rounded w-full pl-10 py-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Enter your first name" autocomplete="off">
            </div>
            <div class="mb-4">
                <label class="block w-full mr-2 text-gray-700 text-sm font-bold mb-2">Last name: </label>
                <input type="text" name="last_name" class="name-input shadow appearance-none border rounded w-full pl-10 py-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Enter your last name" autocomplete="off">
            </div>
            <div class="mb-4">
                <label for="email" class="block w-full mr-2 text-gray-700 text-sm font-bold mb-2">Email address: </label>
                <input type="text" name="email" class="email-input shadow appearance-none border rounded w-full pl-10 py-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Enter your email address" autocomplete="off">
            </div>
            <div class="mb-4">
                <label for="password" class="block w-full mr-2 text-gray-700 text-sm font-bold mb-2">Password: </label>
                <input type="password" name="password" class="password-input shadow appearance-none border rounded w-full pl-10 py-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Enter your password" autocomplete="off">
            </div>
            <div class="mb-4">
                <label for="confirm_password" class="block w-full mr-2 text-gray-700 text-sm font-bold mb-2">Confirm Password: </label>
                <input type="password" name="confirm_password" class="password-input shadow appearance-none border rounded w-full pl-10 py-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Confirm password" autocomplete="off">
            </div>
            <div class="mb-4">
                <input type="submit" value="Register" class="shadow appearance-none border rounded w-full py-2 px-3 text-white rounded bg-gray-700 hover:bg-gray-900 leading-tight focus:outline-none focus:shadow-outline transition cursor-pointer">
            </div>
        </form>
        <footer class="text-right">
            <p>Already have an account? <a href="login" class="text-slate-500 hover:text-slate-900">Login here</a></p>
        </footer>
    </div>
</body>
</html>