<?php 
include 'classes/Login.php';
include 'classes/Database.php';
$pdo = Database::connection();
$login = new Login($pdo);

// Input from the user
$email = $_POST['email'];
$password = $_POST['password'];

// If email is correct
if ($login->verifyEmail($email)){
	$user = $login->verifyEmail($email);

	// If password is correct
	if ($login->verifyPassword($user, $password)){
		header("Location: userpage.php");
	}
	else {
		header("Location: login.php");
	}
}
else {
    header("Location: login.php");
}