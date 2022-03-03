<?php 
    session_start();
    require('conn.php');

    if(isset($_POST['action']) && $_POST['action'] == 'upload'){
        if(!empty(validate_file($_FILES))){
            $_SESSION['errors'] = validate_file();
            header('Location: ./index.php');
            die();
        }
        else {
            upload_file($_FILES);
            $_SESSION['success'] = "File uploaded successfully";
            header('Location: ./index.php');
            die();
        }
    }

    function validate_file(){
        $errors = array();
        $csvfile = $_FILES['upload_file']['name'];
        $filename = pathinfo($csvfile, PATHINFO_FILENAME);
        $extension = pathinfo($csvfile, PATHINFO_EXTENSION); // get image extension
        $query = "SELECT * FROM csv WHERE file = '$filename' ";
        $record = fetch_record($query);

        if(empty($filename)){
            $errors[] = 'Upload file cannot be empty';
        }
        else if(!in_array($extension, ['csv'])){
            $errors[] = 'Uploaded file extension invalid';
        }
        else if($filename == $record['file']){
            $errors[] = 'File name already existed, kindly rename it.';
        }
        return $errors;
    }

    function upload_file($data){
        $csvfile = $data['upload_file']['name'];
        $filename = pathinfo($csvfile, PATHINFO_FILENAME);
        $file = $data['upload_file']['tmp_name'];
        $upload_dir = './upload/' . $csvfile;

        move_uploaded_file($file, $upload_dir);
        $query = "INSERT INTO csv(file, created_at) VALUES('$filename', NOW())";
        run_mysql_query($query);
    }

    function print_message(){
        if(isset($_SESSION['errors'])){
            foreach($_SESSION['errors'] as $error){
                echo '<p class="error">' . $error . "</p>";
            } 
            unset($_SESSION['errors']); 
        }
        else if(isset($_SESSION['success'])){
            echo '<p class="success">' . $_SESSION['success'] . "</p>";
            unset($_SESSION['success']); 
        }
    } 
?>