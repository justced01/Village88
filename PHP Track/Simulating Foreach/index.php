<?php
    // For this exercise, predict the output of given codes without seeking console first . This skill is a must to learn when aiming to be a developer.
    // 1. What do you think will be the output of below code? Try to guess before running it!
    echo "#1 <br>";
    $list = array(2,4,6,8);
    foreach($list as $key => $value){
        echo $key . " - " . $value ."<br />";
    }
    /** Output:
     * 0 - 2
     * 1 - 4
     * 2 - 6
     * 3 - 8
    */

    echo "<br> #2 <br>";
    // 2. What would be the output of the following code? Try to guess before running it!
    $list = array(2,4,6,8);
    foreach($list as $value){
        echo $value ."<br />";
    }
    /** Output:
     * 2
     * 4
     * 6
     * 8
    */

    echo "<br> #3 <br>";
    // 3. What will be the output of this? Again, guess the output before running the code.
    $fruits= array("A" => "Apple", "B" => "Banana");
    foreach($fruits as $key => $value){
        echo $key . " - " . $value ."<br />";
    }
    /** Output:
     * A - Apple
     * B - Banana
    */

    echo "<br> #4 <br>";
    // 4. How about the following code? Try to guess the output of the code before running it!
    $fruits= array("A" => "Apple", "B" => "Banana");
    foreach($fruits as $key => $value){
        echo $value ."<br />";
    }
    /** Output:
     * Apple
     * Banana
    */

    echo "<br> #5 <br>";
    // 5. Let's change the echo statement. Make a guess!
    $fruits= array("A" => "Apple", "B" => "Banana");
    foreach($fruits as $key => $value){
        echo $key ."<br />";
    }
    /** Output:
     * A
     * B
    */

    echo "<br> #6 <br>";
    // 6. Okay. Now let's make it more challenging. What would be the output of the following code?
    $plots = array( 
                array("a1", "a2", "a3"), 
                array("b1", "b2", "b3"), 
                array("c1", "c2", "c3")
            );
    foreach($plots as $key => $value){
        echo "Key is {$key}<br />";
        echo "logging the value ";
        var_dump($value);
    }
    /** Output:
     * Key is 0
     * logging the value array(3) { [0]=> string(2) "a1" [1]=> string(2) "a2" [2]=> string(2) "a3" } Key is 1
     * logging the value array(3) { [0]=> string(2) "b1" [1]=> string(2) "b2" [2]=> string(2) "b3" } Key is 2
     * logging the value array(3) { [0]=> string(2) "c1" [1]=> string(2) "c2" [2]=> string(2) "c3" }
    */

    echo "<br>";
    echo "<br> #7 <br>";
    // 7. Now what about this? Again guess the output before running the code.
    $plots = array( 
                    array("a1", "a2", "a3"), 
                    array("b1", "b2", "b3"), 
                    array("c1", "c2", "c3")
                );
    foreach($plots as $value){
        echo "logging the value";
        var_dump($value);
    }
    /** Output:
     * logging the valuearray(3) { [0]=> string(2) "a1" [1]=> string(2) "a2" [2]=> string(2) "a3" } logging the valuearray(3) { [0]=> string(2) "b1" [1]=> string(2) "b2" [2]=> string(2) "b3" } logging the valuearray(3) { [0]=> string(2) "c1" [1]=> string(2) "c2" [2]=> string(2) "c3" }
    */ 

    echo "<br>";
    echo "<br> #8 <br>";
    // 8. Okay. Now let's make it even harder. What would be the output of the following code?
    $nations = array( 
                    array("PH" => "Philippines", "KR" => "South Korea"), 
                    array("PHP" => "Philippine peso", "KRW" => "South Korean won"), 
                    array("Manila" => "Maynilad", "Seoul" => "Seorabeol") 
                );
    foreach($nations as $key => $value){
        echo "key is {$key}<br />";
        foreach($value as $key2=>$value2){
                echo $key2 ." - " . $value2."<br />";
        }
    }
    /** Output:
     * key is 0
     * PH - Philippines
     * KR - South Korea
     * key is 1
     * PHP - Philippine peso
     * LRW - South Korean Won
     * key is 2
     * Manila - Maynilad
     * Seoul - Seorabeol
    */ 

    echo "<br> #9 <br>";
    // 9. At last! What about this?
    $nations = array( 
                    array("PH" => "Philippines", "KR" => "South Korea"), 
                    array("PHP" => "Philippine peso", "KRW" => "South Korean won"), 
                    array("Manila" => "Maynilad", "Seoul" => "Seorabeol") 
                );
    foreach($nations as $nation){
        foreach($nation as $key=>$value){
                echo $key ." - " . $value."<br />";
        }
    }
    /** Output:
     * PH - Philippines
     * KR - South Korea
     * PHP - Philippine peso
     * LRW - South Korean Won
     * Manila - Maynilad
     * Seoul - Seorabeol
    */ 
?>