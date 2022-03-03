<?php
    ini_set('auto_detect_line_endings', true);
    $file = fopen("./us-500.csv", "r");
    $count = 1;
    echo "<table border=1>";
    while (($line = fgetcsv($file)) !== false){
        echo $count % 10 == 0 ? '<tr style="background-color: lightgray;">' : '' ;
        foreach ($line as $cell){
            echo "<td>$cell</td>";
        }
        echo "</tr>";
        $count++;
    }
    echo "</table>";

    fclose($file);
    echo "</table>";
?>