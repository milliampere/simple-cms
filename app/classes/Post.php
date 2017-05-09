<?php

include 'Database.php';
// include 'classes/Login.php';

    // $login = new Login();
    // Login::logincheck();

    // if (!isset($_SESSION['loggedIn'])) { 
    //     header('Location: notloggedin.php'); 
    // }

    $pdo = Database::connection();

    

    If(isset($_POST['submit'])){
        try {
        $userId = 1;

        $stmt = $pdo->prepare("INSERT INTO posts (title, content, date)
        VALUES (:postTitle, :postContent, now())");

        $stmt->bindParam(':postTitle', $postTitle);
        $stmt->bindParam(':postContent', $postContent);
        
        $postTitle = $_POST['postTitle'];
        $postContent = $_POST['postContent'];
        

        // $stmt->bindParam(':userId', $userId);
       

    

        
    
        $stmt->execute();
        echo "Post Created";
    }catch(PDOException $e){
    echo "Error: " . $e->getMessage();
    }
    $pdo = null;
    }
    



