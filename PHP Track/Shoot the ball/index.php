<?php
    echo "Practice Starts...<br>";
    $success = 0;
    $fail = 0;
    for($index = 1; $index <= 1000; $index++){
        $attempt = rand(0, 1);
        if($attempt == 1){
            $success++;
            echo "Attempt #$index: Shooting the ball... Success! Got {$success}x success and {$fail}x epic fail(s) so far<br>";
        }
        else {
            $fail++;
            echo "Attempt #$index: Shooting the ball... Epic Fail! Got {$success}x success and {$fail}x epic fail(s) so far<br>";
        }
    }
    echo "Practice Ended...<br>";
?>