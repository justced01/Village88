<?php 
setcookie('theme', 'darkmode', time() + 86400 * 30, '/'); 
echo $_COOKIE['theme']; // echoes out 'darkmode';
?>