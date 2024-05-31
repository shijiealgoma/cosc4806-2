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
  <table>
    <tr>
      <th>
        Username
      </th>
      <th>
        Password
      </th>
    </tr>
  
  <?php
  

  $user = new User();
  $user_list = $user->get_all_users();

  //print out the user list
  foreach($user_list as $user){
    echo "<tr>";
    echo "<td>";
    echo $user['username'];
    echo "</td>";
    echo "<td>";
    echo $user['password'];
    echo "</td>";
  }
    
  
  ?>

  </table>
</body>

</html>