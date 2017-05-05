<?php 
session_start();
include '../database.php';



$email = $_POST['email'];
$password = $_POST['password'];

$stmt = $pdo->prepare("SELECT * FROM users WHERE email='$email'");
$stmt->execute();
$data = $stmt->fetch();

if(!$row = $data){
	//echo "Fel email";
}

// Function
if($data['isAdmin'] == 1){
	$isAdmin = true;
} else {
	$isAdmin = false;
}

$hash = $data['password'];
// Function
if(password_verify($password, $hash)){
	$_SESSION['loggedIn'] = true;
	$_SESSION['email'] = $email;
	$_SESSION['name'] = $data['name'];
	$_SESSION['isAdmin'] = $isAdmin;
}
else {
	//echo "Wrong password";
}

header("Location: ../userPage.php");

// Login, verify password 
/*function verify($pass){
	if(password_verify($pass, $hash)){
		$_SESSION['loggedIn'] = true;
		$_SESSION['username'] = "Camilla";
	} 
	else {
		echo "Liar";
	}
}*/



header("Location: ../userPage.php");
?>