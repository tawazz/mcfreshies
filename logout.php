<?php

session_start();
session_destroy();
echo "you have been logged out ";
echo "<a href=\"index.php\">return to home page</a>";
header('Location: index.php');
?>


