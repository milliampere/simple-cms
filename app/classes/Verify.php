<?php

class Verify {

  public function __construct()
  {
      
  }
  
// For logged in pages only, like settings  
public static function secretPage(){
  if (!isset($_SESSION['loggedIn'])) { 
      header('Location: notloggedin.php'); 
  }
}

// For redirecting when user is already logged in  
public static function alreadyLoggedIn(){
  if (isset($_SESSION['loggedIn'])) { 
      header('Location: userpage.php'); 
  }
}

public static function isAdmin(){
  if(isset($_SESSION['loggedIn']) && isset($_SESSION['isAdmin'])){
     echo "Admin!"; 
     var_dump($_SESSION);
  }
  else if(isset($_SESSION['loggedIn'])) {
    echo "User";
    var_dump($_SESSION);
    } 
  else {
    echo "Viewer";
  }
}



}