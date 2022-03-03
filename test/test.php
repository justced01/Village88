<?php
$strings = array('111 111', 'arf');
foreach ($strings as $testcase) {
    if (ctype_digit($testcase)) {
        echo "The string $testcase consists of all letters.<br>";
    } else {
        echo "The string $testcase does not consist of all letters.<br>";
    }
}
?>