<?php
session_start();
//change button to unlike when liked and add functionality for that
include 'Database.php';


$pdo = Database::connection();

$postId = $_POST['postId']; 
$userId = $_SESSION['id'];

$stmt = $pdo->prepare("SELECT id FROM likes WHERE userId='$userId' AND postId='$postId'");
$stmt->execute();

if($stmt->rowCount() > 0)
{
    $message = "You have already liked this post";
    echo "<script type='text/javascript'>alert('$message');</script>";
    $url='../viewposts.php';
    echo '<META HTTP-EQUIV=REFRESH CONTENT="1; '.$url.'">';
}
else{


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
