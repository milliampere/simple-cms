<?php 
include 'classes/Signup.php';
include 'classes/Database.php';
$pdo = Database::connection();
$signup = new Signup($pdo);

// Input from the user
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];

$signup->createuser($name, $email, $password);


