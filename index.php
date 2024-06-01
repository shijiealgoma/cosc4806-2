<?php
session_start(); 
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
  <div>
    Click above <b>Buttons</b> to see the result!
  </div>
  <?php
    // if  $_SESSION['username']
  if(isset($_SESSION['username']))

  {
    echo "<br>";
    echo "<br>";
    echo "<div>";
    echo "<h1>Welcome, ".$_SESSION['username'] ."</h1>";;
    echo "</div>";
    
    //echo logout button with logout function
    echo "<br>";
    echo "<br>";
    echo "<a href='logout.php'>Logout</a>";
  }
  ?>
  
</body>

</html>