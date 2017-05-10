<?php
include 'classes/User.php';
include 'classes/Database.php';


$pdo = Database::connection();

        try {
        $statement = $pdo->prepare("UPDATE posts SET likes = likes + 1WHERE id = '".$userid."'");
        $statement->execute();
        $data = $statement->fetchAll(PDO::FETCH_ASSOC);
        
        }
        
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }

 ?>