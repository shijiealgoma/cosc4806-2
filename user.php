<?php

require_once ('database.php');

Class User {
  

  //get all user function
  public function get_all_users(){
    $db = db_connect();
    $statement = $db->prepare("SELECT * FROM users");
    $statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
  
    return $result;

  }


  //create user function
  public function create_user($username, $password){
    $db = db_connect();
    $statement = $db->prepare("INSERT INTO users (username, password) VALUES (:username, :password)");
    $statement->bindParam(':username', $username);
    $statement->bindParam(':password', $password);
    $statement->execute();
  }
  
}


?>