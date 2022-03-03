<?php
    function convert_to_blanks($array){
        // Count the array size
        for($index = 0; $index < count($array); $index++){ 
            // Scan the values of array if the value is string
            if(is_string($array[$index])){
                $string = $array[$index];
                echo $string[0];
                for($i = 0; $i < strlen($string); $i++){
                    echo "_ ";
                }
            }
            // Scan the values of array if the value is not string
            else if(is_numeric($array[$index])){
                for($index3 = 0; $index3 < $array[$index]; $index3++){ 
                    echo "_ ";
                }
            }
            echo "<br>";
        }
    }
    $list = array(6, 1, 3, 5, 7);
    convert_to_blanks($list);
    echo "<br>";
    $list = array(4, "Michael", 3, "Karen Marie", 2, "Rogie");
    convert_to_blanks($list);
?>