<?php
// class Posts 
// {
//     public function getPosts($pdo){
        
//     }


// }

//******TODO
//fixa med classer, formatera html så posterna ser bra ut, koppla tables så man får ut user som skrivit inlägget
$options = [ 
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false
        ];

        $pdo = new PDO(
        "mysql:host=localhost;dbname=simple-cms;charset=utf8",
        "root",
        "root", $options);

        try {
        $statement = $pdo->prepare("SELECT * FROM posts");
        $statement->execute();
        $data = $statement->fetchAll(PDO::FETCH_ASSOC);

        
        echo '<ul>';
        
            foreach ($data as $key) {
                $title = $key['title'];
                $content = $key['content'];
            echo "<li> titel: $title  innehåll: $content </li>";

        }
        echo '</ul>';
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }

