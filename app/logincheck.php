<?php 
session_start();
include 'classes/Database.php';
include 'classes/User.php';

$pdo = Database::connection();
$user = new User($pdo);

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


$id = $data['id'];
$hash = $data['password'];
$isAdmin = $user->isAdmin($data['isAdmin']);
$user->verify($password, $hash, $email, $id, $isAdmin);

header("Location: userpage.php");

?>