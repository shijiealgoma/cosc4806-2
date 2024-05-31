<?PHP
//4 buttons: home, show users, add user, login

//home button: go to home.php
//show users button: go to show_users.php
//add user button: go to add_user.php

function get_nav_buttons(){
  echo "<p class='navbar'>";
  echo '<a href="index.php">Home</a>';
  echo '<a href="show_users.php">Show Users</a>';
  echo '<a href="add_user.php">Add User</a>';
  echo '<a href="login.php">Login</a>';
  echo "</p>";
}


?>