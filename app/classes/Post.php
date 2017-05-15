<?php
include 'User.php';
include 'Database.php';

session_start();
// include 'classes/Login.php';

    // $login = new Login();
    // Login::logincheck();

    // if (!isset($_SESSION['loggedIn'])) { 
    //     header('Location: notloggedin.php'); 
    // }

    $pdo = Database::connection();
    
    $userId = $_SESSION['id'];

    If(isset($_POST['submit'])){
        try {

        $stmt = $pdo->prepare("INSERT INTO posts (userId, title, content, date)
        VALUES ($userId, :postTitle, :postContent, now())");

        $stmt->bindParam(':postTitle', $postTitle);
        $stmt->bindParam(':postContent', $postContent);
        

        $postTitle = $_POST['postTitle'];
        $postContent = $_POST['postContent'];
       
    
        echo 'Creating post....';
        
    
        $stmt->execute();
        $url='../viewposts.php';
        echo '<META HTTP-EQUIV=REFRESH CONTENT="1; '.$url.'">';
        
    }catch(PDOException $e){
    echo "Error: " . $e->getMessage();
    }
    $pdo = null;
    }



