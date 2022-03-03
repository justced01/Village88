<?php
    function root($value){
        $array = array();
        foreach($value as $val){
            for($index = 0; $index <= 1000; $index++){
                if($index * $index == $val){
                    array_push($array, $index);
                    break;
                }
            }
        }
        return $array;
    }
    function cube_root($value, $cube){
        $array = array();
        foreach($value as $val){
            for($index = 0; $index <= 1000; $index++){
                if($index ** $cube == $val){
                    array_push($array, $index);
                    break;
                }
            }
        }
        return $array;
    }

    $digits = array(144, 676, 9025);
    $result = root($digits);
    echo '<pre>' , var_dump($result) , '</pre>';

    $digits = array(8, 125, 216);
    $result = cube_root($digits, 3);  
    echo '<pre>' , var_dump($result) , '</pre>';
?>