<?php 
    session_start(); 
    echo session_id(); //outputs random values like: b7a00332815148fb30a2e0e6b7478672
    session_destroy();
?>