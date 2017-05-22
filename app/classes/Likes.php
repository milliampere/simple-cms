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
        $url='../viewposts.php';
        echo '<META HTTP-EQUIV=REFRESH CONTENT="1; '.$url.'">';
        }
        
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }

}
If(isset($_POST['deletepost'])){
        try {
        $stmt = $pdo->prepare("DELETE FROM likes WHERE postId='$postId'");
        $stmt->execute();
        $url='../viewposts.php';
        echo '<META HTTP-EQUIV=REFRESH CONTENT="1; '.$url.'">';
        }
        
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }

}
