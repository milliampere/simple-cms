<!--todo check if admin, then u can delete every post, 
also check which user so you cannot delete others
if not only your own-->
<?php

include 'Database.php';

    $pdo = Database::connection();

   
$id = $_POST['postId']; 
echo 'Deleting post......';
    If(isset($_POST['deletepost']) && isset($_SESSION['isAdmin'])){
        try {
        $stmt = $pdo->prepare("DELETE FROM posts WHERE id='$id'");
    
        $stmt->execute();
        $url='../viewposts.php';
        echo '<META HTTP-EQUIV=REFRESH CONTENT="1; '.$url.'">';
        
    }catch(PDOException $e){
    echo "Error: " . $e->getMessage();
    }
    $pdo = null;
    }
    else{
        // fixa så det ej står deleting post trots att du inte har permissons
        $message = "You do not have permissions to delete this post";
        echo "<script type='text/javascript'>alert('$message');</script>";
        $url='../viewposts.php';
        echo '<META HTTP-EQUIV=REFRESH CONTENT="1; '.$url.'">';
    }
    