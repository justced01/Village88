<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Contact</title>
    <link rel="stylesheet" href="<?= base_url('./assets/css/style.css') ?> ">
</head>
<body>
    <div class="wrapper add">
        <nav>
            <a href="<?= base_url() ?>">Go back</a> | <a href="<?= base_url('display/'. $id) ?>">Show</a>
        </nav>  
        <section class="content">
            <h2>Edit Contact #<?= $id ?></h2>
            <?= $this->session->flashdata('errors') ?>
            <form action="<?= base_url('update/'. $id) ?>" method="post" class="edit-form">
                <div class="input-fields">
                    <label for="firstname">First Name: </label>
                    <input type="text" name="firstname" value="<?= $firstname ?>">
                </div>
                <div class="input-fields">
                    <label for="firstname">Last Name: </label>
                    <input type="text" name="lastname" value="<?= $lastname ?>">
                </div>
                <div class="input-fields">
                    <label for="firstname">Contact Number: </label>
                    <input type="text" name="contact_num" value="<?= $contact_num ?>">
                </div>
                <input type="hidden" name="action" value="edit">
                <input type="submit" value="Submit">
            </form>
        </section>
    </div>
</body>
</html>