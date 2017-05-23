<?php
session_start();
include 'classes/Database.php';
$pdo = Database::connection();

$postId = $_POST["postid"];
$likesId = $_POST["likeId"];
//echo "Postid: " . $postId;

   try {
    $stmt = $pdo->prepare("SELECT COUNT(*) AS count FROM likes WHERE postid = :postId");
    $stmt->bindParam(':postId', $postId);
    $stmt->execute();
    $likes = $stmt->fetchAll();
    //var_dump($likes[0]);
    //echo "Antal likes: " . $likes[0]["count"];
    echo $likes[0]["count"];

  }catch(PDOException $e){
    echo "Error: " . $e->getMessage();
  }



