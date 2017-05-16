<?php
include 'User.php';
include 'Database.php';

session_start();

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


    If(isset($_POST['edit'])){
        try {

        $newTitle = $_POST['newTitle'];
        $newContent = $_POST['newContent'];
        $postId = $_POST['postId'];

        $stmt = $pdo->prepare("UPDATE posts SET title = :newTitle, content = :newContent WHERE id = :postId");

        $stmt->bindParam(':newTitle', $newTitle);
        $stmt->bindParam(':newContent', $newContent);
        $stmt->bindParam(':postId', $postId);
        
        echo 'Updating post....';
        
        $stmt->execute();
        $url='../viewposts.php';
        echo '<META HTTP-EQUIV=REFRESH CONTENT="1; '.$url.'">';
        
    }catch(PDOException $e){
    echo "Error: " . $e->getMessage();
    }
    $pdo = null;
    }


