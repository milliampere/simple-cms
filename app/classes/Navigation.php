<?php

class Navigation {
  
 // Display admin/user/viewer navbar
  public static function displayNavbar(){
    if(isset($_SESSION['loggedIn']) && isset($_SESSION['isAdmin'])){
        include 'includes/adminbar.php';
    }
    else if(isset($_SESSION['loggedIn'])) {
        //include 'includes/userbar.php' ;
        include 'includes/adminbar.php';
    } 
    else {
        include 'includes/navbar.php'; 
    }
  }



}