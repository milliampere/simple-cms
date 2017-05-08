<?php

session_start();
include 'classes/Database.php';
include 'register.php';
include 'login.php';

try {





if(isset($_POST['register_button'])) 
{
    $name = ($_POST['name']);
    $username = ($_POST['username']);
    $email = ($_POST['email']);
    $password = ($_POST['password']);
    $password2 = ($_POST['password2']);

//prepare and bind
$insert = $pdo->prepare("INSERT INTO users (name,email,password,password2)
values(:name,:username,:email,:password,:password2) ");
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
        $_SESSION['name']=$data['name'];  
header("location:index.php");      
}
}
}
catch(PDOException $e)
{
    echo "error".$e->getMessage();
}

    ?>





    
 