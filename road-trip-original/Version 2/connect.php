<?php
    //Database Connection Information
    $dbhost = 'localhost';  
    $dbuser = getenv('DB_USER');
    $dbpass = getenv('DB_PASS');
    $dbname = getenv('DB_NAME');
    try {
        //open the database connection
      $db = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
    }
    catch(PDOException $e) {
        echo $e->getMessage();
    }
?>
