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


  //check username exists
  public function check_username_exists($username) {
    $db = db_connect();

    $statement = $db->prepare("SELECT COUNT(*) FROM users WHERE username = :username");
    $statement->bindParam(':username', $username);
    $statement->execute();

    $count = $statement->fetchColumn(); 

    // Return true if username exists, false otherwise
    return ($count > 0); 
  }

  public function validate_login($username, $password) {
    $db = db_connect();

    $statement = $db->prepare("SELECT * FROM users WHERE username = :username");
    $statement->bindParam(':username', $username);
    $statement->execute();

    // Check if a user is found
    $user = $statement->fetch(PDO::FETCH_ASSOC);
    if (!$user) {
      return false; // Username not found
    }

    // Check if the password matches
    if (password_verify($password, $user['password'])){
      return true;
    }else{
      return false;
    }
  }



  
  
  
}


?>