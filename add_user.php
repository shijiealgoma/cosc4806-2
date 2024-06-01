<?php
require_once ('user.php');
require_once ('nav.php');

?>

<!-- html -->
<!DOCTYPE html>
<html>
<head>
<title>COSC4806 A2</title>
<!-- import style.css -->
<link rel="stylesheet" href="style.css">
</head>

<body>
  <?php
    get_nav_buttons();
  ?>
  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <label for="username">Username:</label>
    <input type="text" id="username" name="username" required> <br>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required> <br>

    <button type="submit" name="submit">Add User</button>
  </form>

  <?php

  if (isset($_POST['submit'])) {
    $username = trim($_POST['username']); // Trim whitespace
    $password = $_POST['password'];

    // Validation logic 
    $errors = []; // Array to store validation errors

    // Username validation example
    if (empty($username)) {
      $errors[] = "Username is required.";
    } else if (strlen($username) < 5) {
      $errors[] = "Username must be at least 5 characters long.";
    }

    // Password validation example
    if (empty($password)) {
      $errors[] = "Password is required.";
    } else if (strlen($password) < 8) {
      $errors[] = "Password must be at least 8 characters long.";
    }

    // Check for existing username in database (optional)
    $existing_user = new User();
    if ($existing_user->check_username_exists($username)) {
      $errors[] = "Username already exists.";
    }

    // If no errors, create the user
    if (empty($errors)) {
      $new_user = new User();
      $new_user->create_user($username, password_hash($password, PASSWORD_DEFAULT));
      echo "<p>User created successfully!</p>";
    } else {
      // Display error messages
      echo "<h3>Errors:</h3>";
      echo "<ul>";
      foreach ($errors as $error) {
        echo "<li>$error</li>";
      }
      echo "</ul>";
    }
  }
  ?>

 
  
</body>

</html>