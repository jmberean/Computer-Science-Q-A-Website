<?php
session_start();
session_destroy();
unset($_SESSION['userName']);
$_SESSION['message']="You are now logged out.";
header("location:loginPage.php");
?>