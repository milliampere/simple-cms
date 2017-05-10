<h1 class="text-center">All posts</h1>
<?php
include 'classes/User.php';
include 'classes/Database.php';


$pdo = Database::connection();

        try {
        $statement = $pdo->prepare("SELECT * FROM posts ORDER BY date DESC");
        $statement->execute();
        $data = $statement->fetchAll(PDO::FETCH_ASSOC);
        
        echo '<div class="posts container">';
        
            foreach ($data as $key) {
                $user = new User($pdo);
                $title = $key['title'];
                $id = $key['userId']; 
                $content = $key['content'];
                $date = $key["date"];
                echo '<div class="col-md-12">';
                echo "<h2> $title </h2>";
                echo '<p style="font-size:12px;font-style:italic" class="postedName">Posted by: '.$user->getName($id).'</p>';
                echo "<p> $content </p>"; 
                echo '<span class="label label-primary">'.$date.'</span><br>';
                echo '<button class="likePost btn btn-primary btn-xs">Like</button>';
                echo '</div>';
                echo '<hr>';
        }
        echo '</div>';
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
