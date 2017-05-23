<?php
session_start();
include 'classes/Database.php';
$pdo = Database::connection();

$postId = $_POST["postid"];
$userId = $_SESSION["id"];

   try {
    $stmt = $pdo->prepare("SELECT COUNT(*) AS count, userid FROM likes WHERE postid = :postId");
    $stmt->bindParam(':postId', $postId);
    $stmt->execute();
    $data = $stmt->fetchAll();
    $likes = $data[0]["count"];

    $stmt = $pdo->prepare("SELECT * FROM likes WHERE postid = :postId AND userid = :userId LIMIT 1");
    $stmt->bindParam(':postId', $postId);
    $stmt->bindParam(':userId', $userId);
    $stmt->execute();
    $data = $stmt->fetchAll();
    $user = $data[0]["userId"];

    // Checks if the (logged-in) user has liked the post and then display different text 
    // messages. 
    if(is_int($user) && (intval($likes) == 1)) {
      echo "You liked this post.";
    }
    else if(is_int($user)){
      echo "You and " . ($likes - 1) . " other people liked this post.";
    }
    else if(intval($likes) == 0){
      echo "This post has no likes yet.";
    }
    else {
      echo "This post has " . $likes . " like(s).";
    }
    

  }catch(PDOException $e){
    echo "Error: " . $e->getMessage();
  }



