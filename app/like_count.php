<?php
session_start();
include 'classes/Database.php';
$pdo = Database::connection();

$postId = $_POST["postid"];
$likesId = $_POST["likeId"];

   try {
    $stmt = $pdo->prepare("SELECT COUNT(*) AS count FROM likes WHERE postid = :postId");
    $stmt->bindParam(':postId', $postId);
    $stmt->execute();
    $likes = $stmt->fetchAll();
    echo "This post has " . $likes[0]["count"] . " like(s)";

  }catch(PDOException $e){
    echo "Error: " . $e->getMessage();
  }



