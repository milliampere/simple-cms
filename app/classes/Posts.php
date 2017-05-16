<?php
include 'User.php';
include 'Database.php';


class Posts {

    public function viewAllPosts(){

        $pdo = Database::connection();

        try {
            $statement = $pdo->prepare("SELECT * FROM posts ORDER BY date DESC");
            $statement->execute();
            $data = $statement->fetchAll();
        
            echo '<div class="posts container">';
        
            foreach ($data as $key) {
                $user = new User($pdo);
                $title = $key['title'];
                $id = $key['userId'];
                $postId = $key['id']; 
                $content = $key['content'];
                $date = $key["date"];
                //$likes = $key['likes'];
                echo '<div class="col-md-12">';
                echo "<h2> $title </h2>";
                echo '<p style="font-size:12px;font-style:italic" class="postedName">Posted by: '.$user->getName($id).'</p>';
                echo "<p> $content </p>"; 
                echo '<span class="label label-primary">'.$date.'</span><br>';

                if(isset($_SESSION['loggedIn'])) {
                    echo '<form action="classes/likes.php" method="post">';
                    echo '<input type="hidden" name="postId" value="'.$postId.'" />';
                    echo '<input type="submit" value="Like" name="likepost" class="likePost btn btn-primary btn-xs"></input><br>';
                    echo '</form>';
                }

                if(isset($_SESSION['loggedIn']) && isset($_SESSION['isAdmin']) || $id == $_SESSION['id'] ){
                    echo '<button class="editPost btn btn-success btn-xs">Edit</button>';

                    echo '<form action="classes/deletepost.php" method="post">';
                    echo '<input type="hidden" name="postId" value="'.$postId.'" />';
                    echo '<input type="hidden" name="id" value="'.$id.'" />';
                    echo '<input type="submit" value="Delete post" name="deletepost" class="deletePost btn btn-danger btn-xs"></input>';
                    echo '</form>';
                }

                //echo '<p>'.$likes.'</p>';
                echo '</div>';
                echo '<hr>';
            }
            echo '</div>';
        }
        catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
}
