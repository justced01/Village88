<?php 
    session_start();
    require_once('new-connection.php');
    if(isset($_POST['add']) && $_POST['add'] == 'Add'){
        $errors = array();
        
        if(empty($_POST['subject'])){
            $errors[] = 'Subject cannot be empty.';
        }
        else if(strlen($_POST['subject']) > 50){
            $errors[] = 'Subject cannot exceed 50 characters.';
        }

        if(empty($_POST['details'])){
            $errors[] = 'Details cannot be empty.';
        }
        else if(strlen($_POST['details']) > 250){
            $errors[] = 'Details cannot exceed 250 characters.';
        }

        if(!empty($errors)){
            $_SESSION['errors'] = $errors;
            header('Location: index.php');
            die();
        }
        else {
            $query = "INSERT INTO bulletin_posts(subject, detail, created_at, updated_at) 
            VALUES('{$_POST['subject']}', '{$_POST['details']}', NOW(), NOW())";
            run_mysql_query($query);
            $_SESSION['success'] = "Your post has been successfully posted in the Bulletin Board";
            header('Location: index.php');
            die();
        }
    }
?>