<?php
session_start();
?>
<html>
   
   <head>
      <title>Welcome </title>
   </head>
   
   <body>
      <h1>Welcome <?php 
      if (!empty($_SESSION['login_user']))
      echo $_SESSION['login_user']; ?></h1> 
      <h2><a href = "ajax/logout.php">Sign Out</a></h2>
   </body>
   
</html>