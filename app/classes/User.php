<?php

class User 
{

    public function getName($pdo){
        echo 'Name: ';
        $statement = $pdo->prepare("SELECT * FROM users");
		$statement->execute();
		$data = $statement->fetchAll(PDO::FETCH_ASSOC);
        foreach($data as $row){
            echo "<li>" . $row["name"] . "</li>";
        }
    }

}