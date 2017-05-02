<?php

class User 
{

    public function getName($pdo){
        $statement = $this->$pdo->prepare("
		SELECT * FROM $users");
		$statement->execute();
		return $statement->fetchAll();
    }

}