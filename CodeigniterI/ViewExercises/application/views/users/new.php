<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New User</title>
</head>
<body>
    <form action="create" method="post">
        <label for="">First Name: </label>
        <input type="text" name="firstname">
        <label for="">Last Name: </label>
        <input type="text" name="lastname">
        <label for="">Email: </label>
        <input type="text" name="email">
        <input type="submit" value="Submit">
    </form>
<?php if(($this->session->userdata('message'))){ ?>
    <p><?= $this->session->userdata('message') ?></p>
<?php } $this->session->unset_userdata('message'); ?>
    <p><a href="users">Index</a></p>
</body>
</html>