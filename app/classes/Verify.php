<?php

class Verify {

  public function __construct()
  {
      session_start();
  }
  
public static function secretPage(){
  session_start();
  if (!isset($_SESSION['loggedIn'])) { 
      header('Location: notloggedin.php'); 
  }
}

public static function alreadyLoggedIn(){
  session_start();
  if (isset($_SESSION['loggedIn'])) { 
      header('Location: userpage.php'); 
  }
}



}