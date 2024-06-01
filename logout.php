<?php
session_start();

 if(isset($_SESSION['username'])){
   session_destroy();
   echo "<p>You have been logged out.</p>";
   echo "<br>";

   echo "<br>";
   echo "<a href='index.php'>Home</a>";
 }

?>