<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback Form</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <div class="wrapper">
        <h1>Feedback Form</h1>
        <form method="POST" action="./process.php">
            <label for="name">Your Name (optional):</label> 
            <input type="text" name="name" id="name">
            <label for="course">Course Title:</label> 
            <select name="course" id="course">
                <option value="PHP Track">PHP Track</option>
                <option value="PHP with Form Data">PHP with Form Data</option>
                <option value="PHP with MySQL">PHP with MySQL</option>
            </select>
            <label for="score">Given Score (1-10):</label> 
            <select name="score" id="score">
                <?php for($index = 1; $index <= 10; $index++) { ?>
                    <option value="<?= $index ?>"><?= $index ?></option>
                <?php } ?>
            </select>
            <label for="reason">Reason:</label>
            <textarea name="reason" id="reason" placeholder="Type here..." cols="45" rows="10"></textarea>
            <input type="submit" value="Submit" name="submit">
    </form>
    </div>
</body>
</html>