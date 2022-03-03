<?php 
    session_start(); 
    // index.php
    // include connection page
    require_once('new-connection.php');
    // get a single record from the interests table joining musics
    $query = "SELECT subjects.title AS subject, lessons.topic AS lesson, lessons.handout_url
            FROM lessons
            LEFT JOIN subjects ON lessons.subject_id = subjects.id
            WHERE lessons.id = 2";
    // since we've included the connection page, we can use the $connection variable
    $result = fetch_record($query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DB Communication</title>
</head>
<body>
    <form action="process.php" method="post">
        <label for="subject">Subject: </label>
        <select name="subject_id" >
            <option value="1">Science</option>
            <option value="2">Math</option>
        </select>
        <label for="subject">Topic: </label>
        <input type="text" name="topic" >
        <label for="subject">URL: </label>
        <input type="text" name="handout_url" >
        <input type="submit" value="Submit">
    </form>
<?php 
    if(isset($_SESSION['message'])){
        echo "<p>" . $_SESSION['message'] . "</p>";
    }
?>
    <div>
        <h3>Subject: <?= $result['subject'] ?></h3>
        <h3>Lesson: <?= $result['lesson'] ?></h3>
        <a href="<?= $result['handout_url'] ?>" target="_blank">Click here to download handout!</a>
    </div>
<?php 
    $query = "SELECT subjects.title AS subject, lessons.topic AS lesson, lessons.handout_url
          FROM lessons
          LEFT JOIN subjects ON lessons.subject_id = subjects .id";
    $results = fetch_all($query); 
    foreach($results as $row){
?>
    <div>
        <h3>Subject: <?= $row['subject'] ?></h3>
        <h3>Lesson: <?= $row['lesson'] ?></h3>
        <a href="<?= $row['handout_url'] ?>">Click here to download handout!</a>
    </div>
<?php } ?>
</body>
</html>