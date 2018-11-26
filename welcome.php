<?php
session_start();
if (!empty($_COOKIE['logged_user'])) {
    $user = json_decode($_COOKIE['logged_user']);
    $username = $user->username;
	require_once(__DIR__.'/ajax/loadFiles.php');
	$files_array = $file_controller->getAllFiles();
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
			<table border="1">
				<tr>
					<td>
						<p><b>Pełna nazwa pliku</b></p>
					</td>
					<td>
						<p><b>Typ pliku W - wykład K- kurs</b></p>
					</td>
					<td>
						<p><b>Data dodania pliku</b></p>
					</td>
					<td>
						<p><b>Przedmiot</b></p>
					</td>
				</tr>
				<?php
				foreach ($files_array as $files) { 
				?>
				<tr>
					<td>
						<?php
							if ($files['file_type'] == "W") { ?>
								<a href="Wyklady/<?php echo $files['filename'] ?>" ><?php echo $files['filename'] ?></a>
							<?php	} else { ?>
								<a href="Kursy/<?php echo $files['filename'] ?>" ><?php echo $files['filename'] ?>
						<?php	} ?>
					</td>
					<td>
						<?php echo $files['file_type'];?>
					</td>
					<td>
						<?php echo $files['c_date'];?>
					</td>
					<td>
						<?php echo $files['file_subject'];?>
					</td>
				</tr>
				<?php } ?>
			</table>
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
		
		<form enctype="multipart/form-data" style="border-style: solid;" action="./ajax/deleteFile.php" method="POST"> 
			<label>Pełna nazwa pliku: </label>
			<input name="filename" type="text"/>
			<label for="typPliku">Typ pliku:</label>
			<select name="fileType">
				<option value="Wyklad">Wykład</option>
				<option value="Kurs">Kurs</option>
			</select> 
			<input type="submit" name ="delete" value="Skasuj plik" /> 
			<p><?php if (!empty($_SESSION['del_message']))
				echo $_SESSION['del_message']; ?></p>
		</form> 
      <h2><a href = "ajax/logout.php">Sign Out</a></h2>
   </body>
   
</html>