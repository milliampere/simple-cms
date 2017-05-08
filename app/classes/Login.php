<?php

class Login {

  public function __construct(){
    session_start();
  }

  public static function logincheck(){
      if(isset($_SESSION['loggedIn']) && isset($_SESSION['isAdmin'])){
          include 'includes/adminbar.php';
      }
      else if(isset($_SESSION['loggedIn'])) {
          //include 'userbar.php';
      } 
      else {
          //echo "Nothing"; 
      }
  }

  // Verify password
  function verify($password, $hash, $email, $id, $isAdmin){
          if(password_verify($password, $hash)){
                  $_SESSION['loggedIn'] = true;
                  $_SESSION['email'] = $email;
                  $_SESSION['id'] = $id;
                  
                  if($isAdmin == 1){
                    $_SESSION['isAdmin'] = true;
                  } else {
                    $_SESSION['isAdmin'] = false;
                  }        
          }
          else {
                  //echo "Wrong password";
          }
  }




}