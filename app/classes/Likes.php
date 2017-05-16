<?php
session_start();
//change button to unlike when liked and add functionality for that
include 'Database.php';


$pdo = Database::connection();

$postId = $_POST['postId']; 
$userId = $_SESSION['id'];

If(isset($_POST['likepost'])){
        try {
        $stmt = $pdo->prepare("INSERT INTO likes (userId, postId) VALUES ($userId, $postId)");
        $stmt->execute();

        }
        
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }

}
