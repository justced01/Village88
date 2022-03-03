<?php
    session_start();
    require_once('new-connection.php');

    // Register Validation
    if(isset($_POST['action']) && $_POST['action'] == 'register'){
        $errors = array();
        $firstname = str_split($_POST['firstname']);
        $lastname = str_split($_POST['lastname']);
        $contact_num = $_POST['contact_num'];
        $email = escape_this_string($_POST['email']);
        $password = escape_this_string($_POST['password']);
        // $salt = bin2hex(random_bytes(10));
        $salt = '123';
        $encrypted_password = md5($password . '' . $salt);
        $cpassword = $_POST['confirm_password'];

        $search_email = "SELECT * FROM users WHERE users.email = '$email'";
        $email_search = fetch_record($search_email);

        // @@ USE salt and md5
        // First Name and Last Name Validation
        foreach($firstname as $element){
            is_numeric($element) ? $firstname = 1 : $firstname = 0;
        }
        if(empty($_POST['firstname'])){
            $errors[] = "First name is required.";
        }
        else if(($firstname)){
            $errors[] = "First name contain letters only.";
        }
        else if(strlen($_POST['firstname']) < 2){
            $errors[] = "First name must be two characters long.";
        }

        foreach($lastname as $element){
            is_numeric($element) ? $lastname = 1 : $lastname = 0;
        }
        if(empty($_POST['lastname'])){
            $errors[] = "Last name is required.";
        }
        else if($lastname){
            $errors[] = "Last name contain letters only.";
        }
        else if(strlen($_POST['lastname']) < 2){
            $errors[] = "Last name must be two characters long.";
        }

        // Contact Number Validation
        if(empty($contact_num)){
            $errors[] = 'Contact number is required.';
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

        // Email Validation
        if(empty($email)){
            $errors[] = "Email address is required.";
        }
        else if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
            $errors[] = "Enter a valid email address.";
        }
        else if($email == $email_search['email']){
            $errors[] = "Email address is already in use.";
        }

        // Password Validation 
        if(empty($_POST['password'])){
            $errors[] = 'Password is required.';
        }
        else if(strlen($_POST['password']) < 8 || strlen($_POST['password']) > 20){
            $errors[] = 'Password length must be 8 to 20 characters.';
        }
        else if($_POST['password'] !== $cpassword){
            $errors[] = 'Your password and confirmation password do not match.';
        }
        if(empty($cpassword)){
            $errors[] = 'Password confirmation is required.';
        }

        // Response if error or success submission
        if(!empty($errors)){
            $_SESSION['errors'] = $errors;
            header('Location: register.php');
            die();
        }
        else {
            $query = "INSERT INTO users(firstname, lastname, contact_num, email, password, salt, created_at, updated_at)
                        VALUES('{$_POST['firstname']}', '{$_POST['lastname']}', '{$contact_num}', '{$email}', '{$encrypted_password}', '{$salt}', NOW(), NOW())";
            run_mysql_query($query);
            $_SESSION['success_msg'] = "Your account has been registered successfully!";
            header('Location: ./index.php');
            die();
        }
    }
    else if(isset($_POST['action']) && $_POST['action'] == 'login'){
        $errors = array();
        $email = escape_this_string($_POST['email']);
        $password = escape_this_string($_POST['password']);
        $query = "SELECT * FROM users WHERE users.email = '$email' ";
        $user = fetch_record($query);

        if(!empty($user)){
            $encrypted_password = md5($password . '' . $user['salt']);
            // Login Validation Email and Password
            if(empty($email)){
                $errors[] = "Email address is required.";
            }
            else if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
                $errors[] = "Enter a valid email address.";
            }
            else if($email !== $user['email']){
                $errors[] = "Email address not found.";
            }

            if($user['password'] != $encrypted_password ){
                $errors[] = 'Your password do not match.';
            }
            else if(empty($password)){
                $errors[] = 'Password is required.';
            }
        }
        
        // Response if error or success submission
        if(!empty($errors)){
            $_SESSION['errors'] = $errors;
            header('Location: index.php');
            die();
        }
        else {
            $_SESSION['firstname'] = $user['firstname'];
            $_SESSION['lastname'] = $user['lastname'];
            $_SESSION['logged_in'] = TRUE;
            header('Location: home.php');
            die();
        }
    }
    if(isset($_POST['action']) && $_POST['action'] == 'forgot'){
        $errors = array();
        $contact_num = $_POST['contact_num'];
        $query = "SELECT * FROM users WHERE users.contact_num = '$contact_num' ";
        $user = fetch_record($query);

        // Contact Number Validation
        if(empty($contact_num)){
            $errors[] = 'Contact number is required.';
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
        else if($contact_num != $user['contact_num']){
            $errors[] = 'Contact number does not exist.';
        }

        // Response if error or success submission
        if(!empty($errors)){
            $_SESSION['errors'] = $errors;
            header('Location: forgot-pass.php');
            die();
        }
        else {
            $query = "UPDATE users SET users.password = 'village88' WHERE users.contact_num = '$contact_num' ";
            run_mysql_query($query);
            $_SESSION['success_msg'] = "Your account password has been updated successfully!";
            header('Location: forgot-pass.php');
            die();
        }
    }
    else {
        session_destroy();
        header('Location: index.php');
        die();
    }
?>