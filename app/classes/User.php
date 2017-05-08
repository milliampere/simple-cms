<?php

class User 
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    // Get the name of the user
    public function getName($id){
        $stmt = $this->pdo->prepare("SELECT name FROM users WHERE id='$id'");
		$stmt->execute();
		$data = $stmt->fetch();
        return $data['name'];
    }

    // Get number of posts a user has posted
    public function numberOfPosts($id){
        $stmt = $this->pdo->prepare("SELECT COUNT(*) AS numberOfPosts FROM posts WHERE userId='$id'");
		$stmt->execute();
		$data = $stmt->fetch();
        return $data['numberOfPosts'];
    }


}