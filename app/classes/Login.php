<?php

class Login {

  private $pdo;

  public function __construct($pdo)
  {
      session_start();
      $this->pdo = $pdo;
  }

  // Check if email exists
  public function verifyEmail($email){
    $stmt = $this->pdo->prepare("SELECT * FROM users WHERE email = :email LIMIT 1");
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $user = $stmt->fetch();
    return $user;
  }

  // Verify password
  function verifyPassword($user, $password){
    $email = $user['email'];
    $hash = $user['password'];
    $id = $user['id'];
    $isAdmin = $user['isAdmin'];

    if(password_verify($password, $hash)){
      $_SESSION['loggedIn'] = true;
      $_SESSION['email'] = $email;
      $_SESSION['id'] = $id;
      
      if($isAdmin == 1){
        $_SESSION['isAdmin'] = true;
      }
      
      return true;     
      }
  }

}
