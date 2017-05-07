<?php 
include 'includes/header.php';

include 'database.php';
include 'classes/User.php';
		$user = new User;
		var_dump($user->getName($pdo));


include 'includes/footer.php';