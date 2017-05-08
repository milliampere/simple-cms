<?php

session_start();

$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false
];
try {


//create connection
$pdo = new PDO(
    "mysql:host=localhost;dbname=simple-cms;charset=utf8",
    "root",
    "root", $options);


if(isset($_POST['register_button'])) 
{
    $name = ($_POST['name']);
    $username = ($_POST['username']);
    $email = ($_POST['email']);
    $password = ($_POST['password']);
    $password2 = ($_POST['password2']);

//prepare and bind
$insert = $pdo->prepare("INSERT INTO users (name,username,email,password,password2)
values(:username,:email,:password,:password2) ");
$insert->bindParam(':name', $name);
$insert->bindParam(':username', $username);
$insert->bindParam(':email', $email);
$insert->bindParam(':password', $password);
$insert->bindParam(':password2', $password2);
$insert->execute();

}elseif(isset($_POST['signin'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

$select = $pdo->prepare("SELECT * FROM users WHERE email='$email' and password='$password'");
$select->setFetchMode(PDO::FETCH_ASSOC);
$select->execute();
$data=$select->fetch();
if($data['email']!=$email and $data['password']!=$password)
{
echo "invalid email or password";
}
elseif($data['email']==$email and $data['password']==$password)
{
    $_SESSION['email']=$data['email'];
        $_SESSION['']        
}
}


    
}

    ?>





    
 