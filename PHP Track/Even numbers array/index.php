<?php 
    // Create an array that inclusively contains all even numbers between 0 to 10,000. Use the var_dump() function at the end to display the array values.
    $even_array = array();
    for($index = 0; $index <= 1000; $index++){
        if($index % 2 == 0){
            array_push($even_array, $index);
        }
    }
    echo '<pre>' , var_dump($even_array), '</pre>';
?>