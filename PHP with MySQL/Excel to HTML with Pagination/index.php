<?php 
    include('process.php');
    $query = "SELECT * FROM csv";
    $files = fetch_all($query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="./style.css" type="text/css">
</head>
<body>
    <div class="index-wrapper">
        <form action="process.php" method="post" enctype="multipart/form-data">
            <input type="file" name="upload_file" value="<?= $filename ?>">
            <input type="hidden" name="action" value="upload">
            <input type="submit" value="Upload">
        </form>
        <?= print_message(); ?>
        <h2>Uploaded Files</h2>
        <ol class="uploaded-list">
<?php foreach ($files as $file){ ?>
            <li><a href="view.php?id=<?= $file['id'] ?> "><?= $file['file'] ?></a></li>
<?php } ?>
        </ol>
    </div>
</body>
</html>