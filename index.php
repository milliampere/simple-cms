<?php 

include 'app/includes/header.php';
include 'app/error.php';


include 'app/database.php';
include 'app/classes/User.php';
		$user = new User;
		var_dump($user->getName($pdo));









include 'app/includes/footer.php';