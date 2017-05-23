<?php
include 'Database.php';

class Posts {

    public function viewPosts(){

        $pdo = Database::connection();
        $posts_to_display = 100;

        try {

            // First time loaded 
            if(!isset($_GET["id"])){
                $statement = $pdo->prepare("SELECT * FROM posts ORDER BY id DESC LIMIT :limit ");
                $statement->bindParam(':limit', $posts_to_display);
                $statement->execute();
                $data = $statement->fetchAll();
            }
            // When load more button is clicked 
            else {
                $counter = intval($_GET["id"]);
                $offset = $counter * 3;

                $statement = $pdo->prepare("SELECT * FROM posts ORDER BY id DESC LIMIT :limit OFFSET :offset");
                $statement->bindParam(':limit', $posts_to_display);
                $statement->bindParam(':offset', $offset);
                $statement->execute();
                $data = $statement->fetchAll();
            }
            
            return $data;
             
        }
        catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
}


