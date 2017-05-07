<?php 
session_start();
include 'database.php';

// Input from the user
$email = $_POST['email'];
$password = $_POST['password'];

// Get user from database
$stmt = $pdo->prepare("SELECT * FROM users WHERE email='$email'");
$stmt->execute();
$data = $stmt->fetch();

// If the email doesn't exist
if(!$row = $data){
	//echo "Fel email";
}

// Check if the user is admin
if($data['isAdmin'] == 1){
	$isAdmin = true;
} else {
	$isAdmin = false;
}

// Verify password, set session variables
function verify($password){
	$hash = $data['password'];
	if(password_verify($password, $hash)){
		$_SESSION['loggedIn'] = true;
		$_SESSION['email'] = $email;
		$_SESSION['name'] = $data['name'];
		$_SESSION['id'] = $data['id'];
		$_SESSION['isAdmin'] = $isAdmin;
	}
	else {
		//echo "Wrong password";
	}
}

verify($password);

header("Location: userpage.php");

?>