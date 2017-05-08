<?php

session_start();

$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false
];

$pdo = new PDO(
    "mysql:host=localhost;dbname=simple-cms;charset=utf8",
    "root",
    "root", $options);


if(isset($_POST['register_button'])) 
{
    
    $username = ($_POST['username']);
    $email = ($_POST['email']);
    $password = ($_POST['password']);
    $password2 = ($_POST['password2']);

$insert = $pdo->prepare("INSERT INTO users (username,email,password,password2)
values(:username,:email,:password,:password2) ");
  

    
}

    ?>





    
 