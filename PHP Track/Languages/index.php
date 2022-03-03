<?php
    $languages = array('PHP', 'JS', 'Ruby');

    function display_languages($languages){
        echo '<h2>Dropdown only</h2>';
        echo '<label for="languages">Programming Languages:</label>';
        echo '<select name="programming languages" id="languages">';
        echo "<option value='{$languages[0]}'>{$languages[0]}</option>";
        echo "<option value='{$languages[1]}'>{$languages[1]}</option>";
        echo "<option value='{$languages[2]}'>{$languages[2]}</option>";
        echo '</select>';
    }
    display_languages($languages);
    echo '<br>';

    function prog_languages($languages){
        echo '<h2>Dropdown with foreach</h2>';
        echo '<label for="languages1">Programming Languages:</label>';
        echo '<select name="programming languages" id="languages1">';
        foreach($languages as $language){
            echo "<option value='$language'>$language</option>";
        }
        echo '</select>';
    }
    prog_languages($languages);
    $languages = array('PHP', 'JS', 'Ruby');
    array_push($languages, 'HTML', 'CSS');
    echo '<br><br><h2>5 Unique States</h2>';
    prog_languages($languages);
?>

