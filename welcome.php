<?php
session_start();
if (!empty($_COOKIE['logged_user'])) {
    $user = json_decode($_COOKIE['logged_user']);
    $username = $user->username;
}
?>
<html>
   
   <head>
      <title>Welcome </title>
   </head>
   
   <body>
      <h1>Welcome <?php 
      if (isset($user))
      echo $username; ?></h1> 
      <h2><a href = "ajax/logout.php">Sign Out</a></h2>
   </body>
   
</html>