<?php
//use to connect to database

require_once 'config.php';

//database connection function
function db_connect()
  try{
    $dbh = new PDO("mysql:host=".DB_HOST.";dbname=".DB_DATABASE.";port=".DB_PORT, DB_USER, DB_PASS);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $dbh;
  }catch(PDOException $e){
    echo "Connection failed: " . $e->getMessage();
  }

  

?>