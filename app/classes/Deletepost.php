<?php

include 'Database.php';
session_start();
$pdo = Database::connection();

   
$postId = $_POST['postId']; 

//samma som userid
$id = $_POST['id'];


    If(isset($_POST['deletepost']) && isset($_SESSION['isAdmin'])){
        try {
        $stmt = $pdo->prepare("DELETE FROM posts WHERE id='$postId'");
    
        $stmt->execute();
        echo 'Deleting post......';
        $url='../viewposts.php';
        echo '<META HTTP-EQUIV=REFRESH CONTENT="1; '.$url.'">';
        
    }catch(PDOException $e){
    echo "Error: " . $e->getMessage();
    }
    $pdo = null;
    }
    elseif(isset($_POST['deletepost']) && $_SESSION['id'] == $id){
       try {
        $stmt = $pdo->prepare("DELETE FROM posts WHERE id='$postId'");
    
        $stmt->execute();
        echo 'Deleting post......';
        $url='../viewposts.php';
        echo '<META HTTP-EQUIV=REFRESH CONTENT="1; '.$url.'">';
        
    }catch(PDOException $e){
    echo "Error: " . $e->getMessage();
    }
    $pdo = null;
    }
    else{
        $message = "You do not have permissions to delete this post";
        echo "<script type='text/javascript'>alert('$message');</script>";
        $url='../viewposts.php';
        echo '<META HTTP-EQUIV=REFRESH CONTENT="1; '.$url.'">';
    }