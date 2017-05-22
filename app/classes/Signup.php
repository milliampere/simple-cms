<?php

class Signup 
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    // Create user in database
    public function createuser($name, $email, $password){

      // Check if email exists
      $stmt = $this->pdo->prepare("SELECT * FROM users WHERE email='$email'");
      $stmt->execute();
      $email_exists = $stmt->fetch();

      if ($email_exists == true) {
        echo "That email does already exist, redirecting..";
        $url='../app/register.php';
        echo '<META HTTP-EQUIV=REFRESH CONTENT="3; '.$url.'">';
        // Here we have to add the error message to the "register page" not as an echo.
      } 
      else {
        // Crypt password 
        $hash = password_hash($password, PASSWORD_DEFAULT);

        // Insert into databse
        $stmt = $this->pdo->prepare("INSERT INTO users (name, email, password)
        VALUES (:name, :email, :hash)");
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':hash', $hash);
        $stmt->execute();
        echo "User created :)";
        // Here we have to redirect
      }

    }
}