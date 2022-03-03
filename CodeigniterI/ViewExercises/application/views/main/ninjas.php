<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <img src="<?= base_url('img/ninjas/' . $ninja['ninja1']); ?>" alt="">
    <img src="<?= base_url('img/ninjas/' . $ninja['ninja2']); ?>" alt="">
    <img src="<?= base_url('img/ninjas/' . $ninja['ninja3']); ?>" alt="">
    <img src="<?= base_url('img/ninjas/' . $ninja['ninja4']); ?>" alt="">
    <img src="<?= base_url('img/ninjas/' . $ninja['ninja5']); ?>" alt="">
<?php for($index = 0; $index < $ninja['loop']; $index++){?>
    <img src="<?= base_url('img/ninjas/' . $ninja['ninja3']); ?>" alt="">
<?php } ?>
</body>
</html>