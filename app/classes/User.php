<?php

class User 
{

    public function getName($pdo){
        echo 'Name: ';
        $statement = $this->pdo->prepare("
		SELECT * FROM users");
		$statement->execute();
		return $statement->fetchAll();
    }

}