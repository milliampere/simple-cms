<?php
session_start();
include 'classes/Database.php';
$pdo = Database::connection();

echo "Request";
$userId = $_POST["userid"];
$postId = $_POST["postid"];
echo $userId . " och " . $postId;

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
        echo "Liken borttagen";
        return "Like";
      }
      else {
        echo "Finns ej";
        $stmt = $pdo->prepare("INSERT INTO likes (userId, postId) VALUES (:userId,:postId)");
        $stmt->bindParam(':userId', $userId);
        $stmt->bindParam(':postId', $postId);
        $stmt->execute();
        echo "Posten är nu liked";
        return "Unlike";
      }

    }catch(PDOException $e){
      echo "Error: " . $e->getMessage();
    }

var_dump($like);
//echo $userid = $_POST["userid"];
//echo $postId = $_POST["postid"];

