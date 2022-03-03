<?php
    function your_score($score){
        
        if($score <= 50){
            echo "<h1>$score</h1>";
            echo "<h2>Never sing again, ever!</h2>";
        }
        else if($score > 50 && $score <= 79){
            echo "<h1>$score</h1>";
            echo "<h2>Practice more!</h2>";
        }
        else if($score >= 80 && $score <= 94){
            echo "<h1>$score</h1>";
            echo "<h2>You're getting better!</h2>";
        }
        else if($score >= 95 && $score <= 100){
            echo "<h1>$score</h1>";
            echo "<h2>What an excellent singer!</h2>";
        }
    }
    $score = rand(1, 100);
    echo "<h1>This is random score</h1>";
    your_score($score);

    echo "<br><h1>This is generated 50 times score</h1>";
    for($index = 50; $index <= 100; $index++){    
        $random = rand(50, 100);
        your_score($random);
    }
?>