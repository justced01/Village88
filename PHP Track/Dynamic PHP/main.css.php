<?php
    header('Content-type: text/css');
    $value = rand(20, 40);
    $color = array('blue', 'red', 'green', 'yellow');
    $random = rand(0, 3);
?>

p { 
    font-size: <?= $value ?>px; 
}
em { 
    color: <?= $color[$random] ?>; 
}