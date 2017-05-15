<?php
//change button to unlike when liked and add functionality for that
include 'Database.php';


$pdo = Database::connection();

$postId = $_POST['postId']; 


If(isset($_POST['likepost'])){
        try {
        $statement = $pdo->prepare("UPDATE posts SET likes = likes + 1 WHERE id = $postId");
        $statement->execute();
        }
        
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }

}
