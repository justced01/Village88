<?php session_start(); 
    require_once('new-connection.php');
    $query = "SELECT * FROM bulletin_posts ORDER BY created_at DESC";
    $results = fetch_all($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Page</title>
    <link rel="stylesheet" href="style.css" type="text/css">
</head>
<body>
    <header>
        <h2>Bulletin Board View</h2>
        <a href="index.php">Add Post</a>
    </header>
    <main>
<?php foreach($results as $post){ 
        $date = date_create($post['created_at']);  
?>
        <article>
            <h3><?= date_format($date, "m/d/Y") ?> - <?= $post['subject'] ?></h3>
            <p><?= $post['detail'] ?></p>
        </article>
<?php } ?>
    </main>
</body>
</html>