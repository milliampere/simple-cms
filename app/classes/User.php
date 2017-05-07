<?php

class User 
{

    // Get the name of the user
    public function getName($pdo, $id){
        $statement = $pdo->prepare("SELECT name FROM users WHERE id='$id'");
		$statement->execute();
		$data = $statement->fetch();
        return $data['name'];
    }

    // Get number of posts a user has posted
    public function numberOfPosts($pdo, $id){
        $statement = $pdo->prepare("SELECT COUNT(*) AS numberOfPosts FROM posts WHERE userId='$id'");
		$statement->execute();
		$data = $statement->fetch();
        return $data['numberOfPosts'];
    }

}