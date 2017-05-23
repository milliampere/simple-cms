<?php

class Verify {
  
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


}
