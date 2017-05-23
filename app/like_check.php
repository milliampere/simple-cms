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

      // Change the button text depending on if the user has liked the post or not
      if($like == true){        
        echo "Unlike";
      }
      else {
        echo "Like";
      }

    }catch(PDOException $e){
      echo "Error: " . $e->getMessage();
    }


