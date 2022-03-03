<?php
    // Create a program that counts from 1 to 1000. As it loops through each number, have your program generate the number and a message saying whether it's multiple of 3 or not.
    for($index = 1; $index <= 1000; $index++){
        // if($index % 3 == 0){
        //     echo "$index => Multiple <br>";
        // } 
        // else {
        //     echo "$index => Not Multiple <br>";
        // }
        echo ($index % 3 == 0) ? "$index => Multiple <br>" : "$index => Not Multiple <br>";
    }
?>