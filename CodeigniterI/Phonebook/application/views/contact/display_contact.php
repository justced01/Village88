<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Contact</title>
    <link rel="stylesheet" href="<?= base_url('./assets/css/style.css') ?> ">
</head>
<body>
    <div class="wrapper display">
        <nav>
            <a href="<?= base_url() ?>">Go back</a> | <a href="<?= base_url('edit/'. $id) ?>">Edit</a>
        </nav>
        <section class="content">
            <h2>Contact #<?= $id ?></h2>
            <p><span>Name:</span>  <?= $firstname . ' ' . $lastname ?></p>
            <p><span>Contact Number:</span> <?= $contact_num ?></p>
        </section>
    </div>
</body>
</html>