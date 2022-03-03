<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete a bookmark</title>
    <link rel="stylesheet" href="<?= base_url('./assets/css/style.css') ?> ">
</head>
<body>
    <div class="wrapper">
        <h2>Are you sure you want to delete?</h2>
<?php if(isset($book)){
		foreach ($book->result() as $row){
?>
		<p class="row"><?= $row->folder ?>/<?= $row->name ?> (<a href="<?= $row->url ?>" target="_blank"><?= $row->url ?></a>) </p>		
        <form action="<?= $row->id ?>" method="post" class="cancel-form">
            <input type="hidden" name="action" value="cancel">
            <input type="submit" value="No" class="noBtn">
        </form>	
        <form action="<?= $row->id ?>" method="post" class="confirm-form">
            <input type="hidden" name="action" value="delete">
            <input type="submit" value="Yes, I want to delete" class="delBtn">
        </form>		
<?php }} ?>

    </div>
</body>
</html>