<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Contacts</title>
    <link rel="stylesheet" href="<?= base_url('./assets/css/style.css') ?> ">
</head>
<body>
    <div class="wrapper home">
        <h1>Contacts</h1>
        <p class="success"><?= $this->session->flashdata('success') ?></p>
        <table>
            <tr>
                <th>Name</th>
                <th>Contact Number</th>
                <th>Actions</th>
            </tr>
<?php if(isset($contacts)){
    foreach($contacts as $contact){ ?>
            <tr>
                <td><?= $contact['firstname'] . ' ' . $contact['lastname'] ?></td>
                <td><?= $contact['contact_num'] ?></td>
                <td class="action">
                    <a href="display/<?= $contact['id'] ?>">View</a> | 
                    <a href="edit/<?= $contact['id'] ?>">Edit</a> | 
                    <form action="remove" method="post" class="remove-form">
                        <input type="hidden" name="id" value="<?= $contact['id'] ?>">
                        <input type="submit" value="Remove">
                    </form>
                </td>
            </tr>
<?php }} ?>
        </table>
        <p class="addBtn"><a href="add">Add new contact</a></p>
    </div>
</body>
</html>

