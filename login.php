<?php
session_start(); 
require_once ('user.php');
require_once ('nav.php');

?>

<!DOCTYPE html>
<html>
<head>
  <title>COSC4806 A2 - Login</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <?php get_nav_buttons(); ?>

  <h2>Login</h2>

  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <label for="username">Username:</label>
    <input type="text" id="username" name="username" required> <br>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required> <br>

    <button type="submit" name="submit">Login</button>
  </form>

  <?php
    

    if (isset($_POST['submit'])) {
      $username = trim($_POST['username']);
      $password = $_POST['password'];

      $new = new User();
      if ( $new -> validate_login($username, $password)) {
        $_SESSION['username'] = $username; 
        echo "<p>Login successful!</p>";
        // echo link go to home page
        echo "<br>";
        echo "<br>";
        echo "<a href='index.php'>Home</a>";

        
        
      } else {
        echo "<p>Invalid username or password.</p>";
      }
    }
  ?>

</body>
</html>
