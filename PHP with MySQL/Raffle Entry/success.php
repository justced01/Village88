<?php
    session_start();
    require_once('new-connection.php');

    $query = "SELECT * FROM phone_numbers";
    $results = fetch_all($query);
    $count = 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Success Page</title>
    <link rel="stylesheet" href="style.css" type="text/css">
</head>
<body>
    <header>
        <h2>Raffle Entries</h2>
        <h3><?= $_SESSION['message'] ?></h3>
        <a href="index.php">Home</a>
    </header>
    <div class="table-wrapper"> 
        <table>
            <tr class="title-header">
                <th>Contact Number</th>
                <th>Date inserted</th>
                <th>Response</th>
            </tr>
<?php foreach($results as $row){ 
    $date = date_create($row['created_at']);   
    $count++; 
?>
            <tr class="color_<?= $count % 2 ?>">
                <td><?= $row['contact_num'] ?></td>
                <td><?= date_format($date, "m-d-Y h:iA") ?></td>
                <td><a href="process.php?id=<?= $row['id']?>" class="delBtn">Delete</a></td>
            </tr>
<?php } ?>
        </table>
    </div>
</body>
</html>