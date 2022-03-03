<?php
    include('connect.php');
    $password = '1231231';
    $encrypted_password = md5($password); //the function md5 is native to PHP
    echo $encrypted_password; //this will show you the encrypted value

    $data = 'jced.delacarcel@gmail.com';
    $email = escape_this_string($data);
    echo "<br>" . $email;
?>