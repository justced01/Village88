<?php
    session_start();
    if(isset($_POST['submit']) && $_POST['submit'] == 'submit'){
        $errors = array();
        $date = explode("/", $_POST['date_today']);
        $firstname = str_split($_POST['first_name']);
        $lastname = str_split($_POST['last_name']);
        $email = $_POST['email'];
        $issue_title = $_POST['issue_title'];
        $issue_details = $_POST['issue_details'];

        // Date Validation
        if(empty($_POST['date_today'])){
            $errors[] = "Date today is required.";
        }
        else if(!checkdate($date[0], $date[1], $date[2])){
            $errors[] = "Invalid date format.";
        }

        //First Name and Last Name Validation
        foreach($firstname as $element){
            is_numeric($element) ? $firstname = 1 : $firstname = 0;
        }
        if(empty($_POST['first_name'])){
            $errors[] = "First name is required.";
        }
        else if(($firstname)){
            $errors[] = "First name contain letters only.";
        }

        foreach($lastname as $element){
            is_numeric($element) ? $lastname = 1 : $lastname = 0;
        }
        if(empty($_POST['last_name'])){
            $errors[] = "Last name is required.";
        }
        else if($lastname){
            $errors[] = "Last name contain letters only.";
        }

        // Email Validation
        if(empty($email)){
            $errors[] = "Email address is required.";
        }
        else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $errors[] = "Enter a valid email address.";
        }

        // Issue Title and Details Validation
        if(empty($issue_title)){
            $errors[] = "Issue Title is required.";
        }
        else if(strlen($issue_title) > 50){
            $errors[] = "Issue Title is too long.";
        }

        if(empty($issue_details)){
            $errors[] = "Issue details is required.";
        }
        else if(strlen($issue_details) > 250){
            $errors[] = "Issue details is too long.";
        }

        // Uploading screenshot
        $upload_dir = "./upload/";
        if (move_uploaded_file($_FILES['screenshot']['tmp_name'], $upload_dir . $_FILES['screenshot']['name'])) {
            echo 'Received file ' . $_FILES['screenshot']['name'] . ' with size ' . $_FILES['screenshot']['size'];
        } else {
            echo 'Upload failed!';
        }

        // Response if error or success submission
        if(!empty($errors)){
            $_SESSION['errors'] = $errors;
            header('Location: ./index.php');
            exit;
        }
        else {
            $_SESSION['success'] = "Thank you for your patience! Please wait a response from our IT team.";
            header('Location: ./index.php');
            exit;
        }
    }
?>