<?php
    session_start();
    require_once('new-connection.php');

    if(isset($_POST['submit']) && $_POST['submit'] == 'submit'){
        $errors = array();
        $contact_num = $_POST['contact_num'];
        // $contact_num = '099572341114';

        if(empty($contact_num)){
            $errors[] = 'Contact number cannot be empty.';
        }
        else if(!is_numeric($contact_num)){
            $errors[] = 'Contact number must be a number.';
        }
        else if(strpos($contact_num, '09') === false){
            $errors[] = 'Invalid Contact number format.';
        }
        else if(strlen($contact_num) > 11 || strlen($contact_num) < 11){
            $errors[] = 'Contact number length is invalid.';
        }

        if(!empty($errors)){
            $_SESSION['errors'] = $errors;
            header('Location: index.php');
            exit;
        }
        else {
            $query = "INSERT INTO phone_numbers(contact_num, created_at, updated_at) 
                    VALUES('{$_POST['contact_num']}', NOW(), NOW())";
            if(run_mysql_query($query)){
                $_SESSION['message'] = "Success! Contact number ". $contact_num ." is now added.";
            }
            header('Location: success.php');
            exit;
        }
    }

    $id = $_GET['id'];  
    if(isset($id)){
        $delete_query = "DELETE FROM phone_numbers WHERE id = $id";
        run_mysql_query($delete_query);
    }
    // $_SESSION['delete'] = "Deleted! Contact number ". $contact_num ." is remove from list.";

    header('Location: success.php');
    die();
?>