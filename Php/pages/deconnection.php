<?php 
session_start();
session_destroy();
header("refresh:1; url=acceuilPage.php");
?>
