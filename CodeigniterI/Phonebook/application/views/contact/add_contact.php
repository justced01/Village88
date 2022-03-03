<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Contact</title>
    <link rel="stylesheet" href="<?= base_url('./assets/css/style.css') ?> ">
</head>
<body>
    <div class="wrapper add">
        <nav>
            <a href="contacts">Go back</a>
        </nav>  
        <section class="content">
            <h2>Add new Contact</h2>
            <?= $this->session->flashdata('errors') ?>
            <form action="create" method="post" class="create-form">
                <div class="input-fields">
                    <label for="firstname">First Name: </label>
                    <input type="text" name="firstname">
                </div>
                <div class="input-fields">
                    <label for="lastname">Last Name: </label>
                    <input type="text" name="lastname">
                </div>
                <div class="input-fields">
                    <label for="contact_num">Contact Number: </label>
                    <input type="text" name="contact_num">
                </div>
                <input type="hidden" name="action" value="create">
                <input type="submit" value="Create">
            </form>
        </section>
    </div>
</body>
</html>