<?php
session_start();
include 'Database.php';


$pdo = Database::connection();

$postId = $_POST['postId']; 
$userId = $_SESSION['id'];


$stmt = $pdo->prepare("SELECT id FROM likes WHERE userId='$userId' AND postId='$postId'");
$stmt->execute();

if($stmt->rowCount() > 0)
{
    If(isset($_POST['deletelike'])){
        try {
        $stmt = $pdo->prepare("DELETE FROM likes WHERE postId='$postId'");
        $stmt->execute();
        // $url='../viewposts.php';
        // echo '<META HTTP-EQUIV=REFRESH CONTENT="1; '.$url.'">';
        }
        
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }

}
    
}else{
    $message = "You have to like before you can dislike";
    echo "<script type='text/javascript'>alert('$message');</script>";
    // $url='../viewposts.php';
    // echo '<META HTTP-EQUIV=REFRESH CONTENT="1; '.$url.'">';
}


