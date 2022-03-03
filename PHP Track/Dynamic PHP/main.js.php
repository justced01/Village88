<?php
    header('Content-type: text/javascript');
    $random = rand(100, 200);
?>

$(document).ready(function(){
    console.log("You are <?= $random ?>x better than before!");
});