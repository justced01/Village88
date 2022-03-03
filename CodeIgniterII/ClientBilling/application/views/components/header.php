<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript" src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
    <title><?= $data['title']; ?></title>
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css'); ?>">
    <script src="<?= base_url('assets/js/index.js') ?>"></script>
    <script type="text/javascript">
        var data = '<?= json_encode($data['result'], JSON_NUMERIC_CHECK); ?>'; 
    </script>
</head>
<body>