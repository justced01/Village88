<?php 
    // Create a program that prints the mean of the values in the array called "numbers". Array "numbers" should have the following values: 13, 143, 88, 65, 120.
    $numbers = array(13, 143, 88, 65, 120);
    for($index = 0; $index < count($numbers); $index++){
        echo "numbers [$index]: $numbers[$index] <br>";
    }
    echo "Mean of series(numbers): " . array_sum($numbers)/count($numbers);
?>