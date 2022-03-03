<?php
    function get_count($values){
        $count_0 = 0;
        $count_1 = 0;
        for($index = 0; $index < count($values); $index++){
            if($values[$index] == 0){
                $count_0++;
            } 
            else if($values[$index] == 1){
                $count_1++;
            }
        }
        return $array = array(
            0 => $count_0,
            1 => $count_1
        );
    }
    $binary = array(1, 1, 0, 1, 1, 0, 1); 
    $output = get_count($binary); 
    var_dump($output); 
?>