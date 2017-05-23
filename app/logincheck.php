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
		$message = "Welcome!";
		echo "<script type='text/javascript'>alert('$message');</script>";
		$url='../app/index.php';
		echo '<META HTTP-EQUIV=REFRESH CONTENT="2; '.$url.'">';
	}
	else {
		$message = "Wrong password or email";
		echo "<script type='text/javascript'>alert('$message');</script>";
		$url='../app/login.php';
		echo '<META HTTP-EQUIV=REFRESH CONTENT="1; '.$url.'">';
	}
}
else {
    header("Location: login.php");
}