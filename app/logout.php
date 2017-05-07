<?php 

session_destroy();

// Clear session array
$_SESSION = array();

header("Location: index.php");

