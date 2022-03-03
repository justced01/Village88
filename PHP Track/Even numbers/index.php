<?php 
    // Create a program that prints all the even numbers from 1 to 1000. Use the standard for loop for this exercise and don't create any arrays.
    for($index = 0; $index <= 1000; $index++){
        if($index % 2 == 0){
            echo $index . "<br>";
        }
    }
?>