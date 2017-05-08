<?php

    $options = [ 
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false
    ];

    $pdo = new PDO(
    "mysql:host=localhost;dbname=simple-cms;charset=utf8",
    "root",
    "root", $options);

    If(isset($_POST['submit'])){
        try {
    
        $stmt = $pdo->prepare("INSERT INTO posts (title, content, date)
        VALUES (:postTitle, :postContent, now())");
        $stmt->bindParam(':postTitle', $postTitle);
        $stmt->bindParam(':postContent', $postContent);

        $postTitle = $_POST['postTitle'];
        $postContent = $_POST['postContent'];
    
        $stmt->execute();
        echo "Post Created";
    }catch(PDOException $e){
    echo "Error: " . $e->getMessage();
    }
    $pdo = null;
    }
    



