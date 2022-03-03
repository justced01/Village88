<?php 
    session_start();
    require_once('new-connection.php');
    define('SALT', 'd#f453dd');

    if(isset($_POST['action']) && $_POST['action'] == 'register'){
        if(!empty(validate_account($_POST))){
            $_SESSION['errors'] = validate_account($_POST);
            header('Location: ./register.php');
            die();
        }
        else {
            insert_account($_POST);
            $_SESSION['success'] = "Your account has been registered successfully!";
            header('Location: ./index.php');
            die();
        }
    }
    else if(isset($_POST['action']) && $_POST['action'] == 'login'){
        if(!empty(validate_login($_POST))){
            $_SESSION['errors'] = validate_login($_POST);
            header('Location: ./index.php');
            die();
        }
        else {
            get_user($_POST);
            header('Location: ./main.php');
            die();
        }
    } 
    else if(isset($_POST['action']) && $_POST['action'] == 'review'){
        if(empty($_POST['review'])){
            $_SESSION['errors'][] = "Content must not empty.";
            header('Location: ./main.php');
            die();
        }
        else {
            insert_review($_POST);
            header('Location: ./main.php');
            die();
        }
    }  
    else if(isset($_POST['action']) && $_POST['action'] == 'reply'){
        if(empty($_POST['reply'])){
            $_SESSION['errors'][] = "Content must not empty.";
            header('Location: ./main.php');
            die();
        }
        else {
            insert_reply($_POST);
            header('Location: ./main.php');
            die();
        }
    }  
    else {
        session_destroy();
        header('Location: index.php');
        die();
    }
    
    function validate_account($data){
        $errors = array();

        if(empty($data['firstname'])){
            $errors[] = 'First name is missing.';
        }
        else if(valid_firstname($data['firstname'])){
            $errors[] = 'First name is contain letters only.';
        }
        else if(strlen($data['firstname']) < 2){
            $errors[] = "First name must be two characters long.";
        }

        if(empty($data['lastname'])){
            $errors[] = 'Last name is missing.';
        }
        else if(valid_lastname($data['lastname'])){
            $errors[] = 'Last name is contain letters only.';
        }
        else if(strlen($data['lastname']) < 2){
            $errors[] = "Last name must be two characters long.";
        }

        if(empty($data['email'])){
            $errors[] = "Email address is missing.";
        }
        else if(!filter_var($data['email'], FILTER_VALIDATE_EMAIL)){
            $errors[] = "Enter a valid email address.";
        }
        else if(check_email($data['email'])){
            $errors[] = "Email address is already in use.";
        }

        if(empty($data['password'])){
            $errors[] = 'Password is missing.';
        }
        else if(strlen($data['password']) < 8 || strlen($data['password']) > 20){
            $errors[] = 'Password length must be 8 to 20 characters.';
        }
        else if($data['password'] != $data['cpassword']){
            $errors[] = 'Your password and confirmation password do not match.';
        }
        if(empty($data['cpassword'])){
            $errors[] = 'Password confirmation is missing.';
        }

        return $errors;
    }

    function validate_login($data){
        $errors = array();
        $email = escape_this_string($data['email']);
        $password = escape_this_string($data['password']);
        $query = "SELECT * FROM users WHERE users.email = '$email'";
        $row = fetch_record($query); 

        if(!empty($row)){
            if(md5($data['password'].SALT) != $row['password']){
                $errors[] = "Login Failed";
            }
        }
        else if(empty($data['email'])){
            $errors[] = "Email address is missing.";
        }
        else {
            $errors[] = "Invalid email address.";
        }

        if(empty($data['password'])){
            $errors[] = 'Password is missing.';
        }

        return $errors;
    }

    // Function for checking firstname and lastname containing letters only.
    function valid_firstname($firstname){
        $valid_name = str_split($firstname);
        foreach($valid_name as $value){
            is_numeric($value) ? $result = 1 : $result = 0;
        }
        return $result;
    }

    function valid_lastname($lastname){
        $valid_name = str_split($lastname);
        foreach($valid_name as $value){
            is_numeric($value) ? $result = 1 : $result = 0;
        }
        return $result;
    }

    function check_email($email){
        $query = "SELECT * FROM users WHERE users.email = '$email'";
        $rows = fetch_all($query); 
        count($rows) > 0 ? $result = 1 : $result = 0;
        return $result;
    }

    function insert_account($data){
        $email = escape_this_string($data['email']);
        $password = escape_this_string($data['password']);
        $encrypted_password = md5($password.SALT);
        
        $query = "INSERT INTO users(firstname, lastname, email, password, created_at)
                    VALUES('{$data['firstname']}', '{$data['lastname']}', '{$data['email']}', '$encrypted_password', NOW())";
        run_mysql_query($query);
    }

    function get_user($data){
        $query = "SELECT * FROM users WHERE users.email = '{$data['email']}' ";
        $user = fetch_record($query);

        $_SESSION['firstname'] = $user['firstname'];
        $_SESSION['lastname'] = $user['lastname'];
        $_SESSION['id'] = $user['id'];
        $_SESSION['logged_in'] = TRUE;
    }

    function insert_review($data){
        $query = "INSERT INTO reviews(user_id, content, created_at)
                    VALUES('{$_SESSION['id']}', '{$data['review']}', NOW())";
        run_mysql_query($query);
    }
    function insert_reply($data){
        $query = "INSERT INTO replies(user_id, review_id, content, created_at)
                    VALUES('{$_SESSION['id']}', '{$data['review_id']}', '{$data['reply']}', NOW())";
        run_mysql_query($query);
    }
?>