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


if(isset($_POST['register_btn'])) {
    session_start();
    $username = mysql_real_escape_string($_POST['username']);
    $email = mysql_real_escape_string($_POST['email']);
    $password = mysql_real_escape_string($_POST['password']);
    $password2 = mysql_real_escape_string($_POST['password2']);

    if ($password == $password2) {
        $password = md5($password); //hash password
        $sql = "INSERT INTO users(username, email, password) VALUES('$username', '$email', '$password')"
        
    }

    
}

    ?>





    
 