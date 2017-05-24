<?php
session_start();
include 'classes/Database.php';
$pdo = Database::connection();

$userId = $_POST["userid"];
$postId = $_POST["postid"];

    try {

      $stmt = $pdo->prepare("SELECT * FROM likes WHERE userid = :userId AND postid = :postId LIMIT 1");
      $stmt->bindParam(':userId', $userId);
      $stmt->bindParam(':postId', $postId);
      $stmt->execute();
      $like = $stmt->fetchAll();

      if($like == true){
        $stmt = $pdo->prepare("DELETE FROM likes WHERE userid = :userId AND postid = :postId");
        $stmt->bindParam(':userId', $userId);
        $stmt->bindParam(':postId', $postId);
        $stmt->execute();
      }
      else {
        $stmt = $pdo->prepare("INSERT INTO likes (userId, postId) VALUES (:userId,:postId)");
        $stmt->bindParam(':userId', $userId);
        $stmt->bindParam(':postId', $postId);
        $stmt->execute();
      }

    }catch(PDOException $e){
      echo "Error: " . $e->getMessage();
    }



