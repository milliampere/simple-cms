<?php 
include 'classes/Login.php';
include 'error.php';
$login = new Login();

// Input from the user
$email = $_POST['email'];
$password = $_POST['password'];

include 'classes/Database.php';
include 'classes/User.php';

$pdo = Database::connection();
$user = new User($pdo);

// Get user from database
$stmt = $pdo->prepare("SELECT * FROM users WHERE email='$email'");
$stmt->execute();
$data = $stmt->fetch();

// If the email doesn't exist
if(!$row = $data){
	echo "Fel email";
}
else {
	$id = $data['id'];
	$hash = $data['password'];
	$isAdmin = $data['isAdmin'];
	$login->verify($password, $hash, $email, $id, $isAdmin);

	header("Location: userpage.php");

}


?>