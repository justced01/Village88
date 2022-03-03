<?php
    function print_card($cards){
        echo "List of keys in the array:<br>";
        echo "<ul>";
        foreach($cards as $key => $value){
            echo "<li> $key </li>";
        }
        echo "</ul>";
        
        foreach($cards as $key => $value){
            echo "The value of $key in Pyramid Solitaire is $value. <br>";
        }
    }
    $cards['King'] = 13;
    $cards['Queen'] = 12;
    $cards['Jack'] = 11;
    $cards['Ace'] = 1;
    print_card($cards);
?>