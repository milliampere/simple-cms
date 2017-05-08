<?php

class User 
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    // Get the name of the user
    public function getName($id){
        $stmt = $this->pdo->prepare("SELECT name FROM users WHERE id='$id'");
		$stmt->execute();
		$data = $stmt->fetch();
        return $data['name'];
    }

    // Get number of posts a user has posted
    public function numberOfPosts($id){
        $stmt = $this->pdo->prepare("SELECT COUNT(*) AS numberOfPosts FROM posts WHERE userId='$id'");
		$stmt->execute();
		$data = $stmt->fetch();
        return $data['numberOfPosts'];
    }

    public static function logincheck(){
        if($_SESSION['loggedIn'] && $_SESSION['isAdmin']){
            include 'includes/adminbar.php';
        }
        else if($_SESSION['loggedIn']) {
            //include 'userBar.php';
        } else {
            echo "Wrong";
        }
    }

    // Verify password
    function verify($password, $hash, $email, $id, $isAdmin){
            if(password_verify($password, $hash)){
                    $_SESSION['loggedIn'] = true;
                    $_SESSION['email'] = $email;
                    $_SESSION['id'] = $id;
                    $_SESSION['isAdmin'] = $isAdmin;
            }
            else {
                    //echo "Wrong password";
            }
    }

    // Check if the user is admin
    function isAdmin($isAdmin){
            if($isAdmin == 1){
            return true;
        } else {
            return false;
        }
    }

}