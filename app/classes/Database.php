<?php

class Database
{

  public static function connection()
  {
    $options = [ 
		  PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
	    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
	    PDO::ATTR_EMULATE_PREPARES   => false
	  ];

		try {
			return new PDO(
	    "mysql:host=localhost;dbname=simple-cms;charset=utf8",
	    "root",
	    "root", 
      $options);
		}
		catch (PDOException $error) {
			echo $error->getMessage();
		}

  }
}
