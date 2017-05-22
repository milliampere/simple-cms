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

                try {
                $stmt2 = $pdo->prepare("SELECT count(*) from likes where postId = '$postId'");
                $stmt2->execute();
                $likes = $stmt2->fetch(PDO::FETCH_ASSOC);
                
                }catch(PDOException $e){
                echo "Error: " . $e->getMessage();
                }

                echo '<div class="col-md-12">';
                echo "<h2> $title </h2>";
                echo '<p style="font-size:12px;font-style:italic" class="postedName">Posted by: '.$user->getName($id).'</p>';
                echo "<p> $content </p>"; 
                echo '<span class="label label-primary">'.$date.'</span><br>';

                if(isset($_SESSION['loggedIn'])) {
                    echo '<iframe name="likeframe" style="display:none;"></iframe>';
                    echo '<form action="classes/likes.php" class="likepost" method="post" target="likeframe">';
                    echo '<input type="hidden" name="postId" value="'.$postId.'" />';
                    echo '<input type="submit" value="Like" name="likepost" class="likePost btn btn-primary btn-xs"></input><br>';
                    echo '</form>';
                }
                 if(isset($_SESSION['loggedIn'])) {
                    echo '<iframe name="deletelike" style="display:none;"></iframe>';
                    echo '<form action="classes/deletelike.php" class="deletelike" method="post" target="deletelike">';
                    echo '<input type="hidden" name="postId" value="'.$postId.'" />';
                    echo '<input type="submit" value="Dislike" name="deletelike" class="delepost btn btn-danger btn-xs"></input><br>';
                    echo '</form>';
                }

                if(isset($_SESSION['isAdmin']) || (isset($_SESSION['id']) && $id == $_SESSION['id']) ){
                    echo '<form action="classes/deletepost.php" class="deletepost" method="post">';
                    echo '<input type="hidden" name="postId" value="'.$postId.'" />';
                    echo '<input type="hidden" name="id" value="'.$id.'" />';
                    echo '<input type="submit" value="Delete post" name="deletepost" class="deletePost btn btn-danger btn-xs"></input>';
                    echo '</form>';

                    echo '<form action="editpost.php" class="editpost" method="post">';
                    echo '<input type="hidden" name="postId" value="'.$postId.'" />';
                    echo '<input type="hidden" name="id" value="'.$id.'" />';
                    echo '<input type="submit" value="Edit post" name="editpost" class="editPost btn btn-success btn-xs"></input>';
                    echo '</form>';
                        
                }

                echo '<p>'.$likes['count(*)'].'</p>';
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
