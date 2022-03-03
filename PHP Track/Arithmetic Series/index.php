<?php 
    // Create a program that prints the arithmetic series or sum of the sequence of values in the array "numbers". Your "numbers" array should contain the following sequence: 2, 5, 8, 11, 14.
    $numbers = array(2, 5, 8, 11, 14);
    $sum = 0;
    for($index = 0; $index < count($numbers); $index++){
        echo "numbers [$index]: $numbers[$index] <br>";
        $sum += $numbers[$index];
    }
    echo "Sum of series(numbers): $sum";
?>