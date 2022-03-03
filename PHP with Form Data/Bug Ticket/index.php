<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bug Ticket</title>
    <link rel="stylesheet" href="./style.css" type="text/css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
    <script>
    $( function() {
        $( "#date_today" ).datepicker();
    } );
    </script>
</head>
<body>
    <h1>Bug Ticket</h1>
    <form action="process.php" method="post" enctype="multipart/form-data">
<?php if(isset($_SESSION['errors'])){ 
        foreach($_SESSION['errors'] as $error){ ?>
        <p class="error"><?= $error; ?></p>
<?php } unset($_SESSION['errors']); } ?>
        <label for="date_today">Date (MM/DD/YYYY): </label>
        <input type="text" name="date_today" id="date_today">
        <label for="first_name">First Name:: </label>
        <input type="text" name="first_name" placeholder="Enter your first name...">
        <label for="last_name">Last Name: </label>
        <input type="text" name="last_name" placeholder="Enter your last name...">
        <label for="email">Email: </label>
        <input type="text" name="email" placeholder="Enter your email address">
        <label for="issue_title">Issue Title: </label>
        <input type="text" name="issue_title" >
        <label for="issue_details">Issue Details: </label>
        <textarea name="issue_details" cols="20" rows="5"></textarea>
        <label for="screenshot">Screenshot (optional):</label>
        <input type="file" name="screenshot" >
        <input type="hidden" name="submit" value="submit">
        <input type="submit" value="Submit">
<?php if(isset($_SESSION['success'])){ ?>
        <p class="success"><?= $_SESSION['success']; ?></p>
<?php unset($_SESSION['success']); } ?>
    </form>
</body>
</html>