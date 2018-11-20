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
		<form enctype="multipart/form-data" style="border-style: solid;" action="./ajax/uploadFile.php" method="POST"> 
			<input type="hidden" name="MAX_FILE_SIZE" value="500000000000000000" /> 
			<input name="plik" type="file" /> 
			<label for="typPliku">Typ pliku:</label>
			<select name="fileType">
				<option value="Wyklad">Wykład</option>
				<option value="Kurs">Kurs</option>
			</select> 
			<label for="przedmiot">Przedmiot:</label>
			<select name="subjectFile">
				<option value="PSIAI">PSIAI</option>
				<option value="CYBER">CYBER</option>
			</select> 
			<input type="submit" name ="upload" value="Wyślij plik" /> 
			<p><?php if (!empty($_SESSION['file_message']))
							echo $_SESSION['file_message']; ?></p>
		</form> 
      <h2><a href = "ajax/logout.php">Sign Out</a></h2>
   </body>
   
</html>