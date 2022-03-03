<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="<?= base_url('./assets/css/style.css') ?> ">
</head>
<body>
    <div class="wrapper">
        <div class="profile-content">
            <p class="logoutBtn"><a href="<?= base_url('/logout') ?>">Logout</a></p>
            <fieldset>
                <legend>Basic Information</legend>
<?php if($this->session->flashdata('login-success')){ ?>
				<p class="success"><?= $this->session->flashdata('login-success') ?></p>
<?php } ?>
                <p><span>First name:</span> <?= $this->session->userdata('firstname'); ?> </p>
                <p><span>Last name:</span> <?= $this->session->userdata('lastname'); ?></p>
                <p><span>Email address:</span> <?= $this->session->userdata('email'); ?></p>
                <p><span>Contact number:</span> <?= $this->session->userdata('contactnum'); ?></p>
            </fieldset>
        </div>
    </div>
</body>
</html>