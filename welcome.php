<?php
session_start();
if (!empty($_COOKIE['logged_user'])) {
    $user = json_decode($_COOKIE['logged_user']);
<<<<<<< HEAD
	$username = $user->username;
	$user_id = $user->user_id;
	require_once(__DIR__.'/ajax/loadFiles.php');
	$files_array = $file_controller->getAllFiles();
	$history_array = $history_controller->getAllHistoryRecords($user_id);
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

						<a href=<?php echo "ajax/download.php?file=".$files['filename']."&type=".$files['file_type']."" ?> ><?php echo $files['filename'] ?></a>
	
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
=======
    $username = $user->username;
}
include 'statystyki.php';

if( $username == 'tj35975') {
    require_once(__DIR__.'/headerAdmin.php');
}
else{
    require_once(__DIR__.'/headerUser.php');
}
?>
<header id="header">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h1>Pulpit</h1>
            </div>
        </div>
    </div>
</header>

      <section id="main">
          <div class="container">

              <div class="col-md-10">
                  <!-- Website Overview -->
                  <div class="panel panel-default">
                      <div class="panel-heading main-color-bg">
                          <h3 class="panel-title">Statystyki</h3>
                      </div>
                      <div class="panel-body">
                          <div class="col-md-3">
                              <div class="well dash-box">
                                  <h2><?php echo count($user_array) ?></h2>
                                  <h4>Użytkowników</h4>
                              </div>
                          </div>
                          <div class="col-md-3">
                              <div class="well dash-box">
                                  <h2><?php echo $ile_dni?></h2>
                                  <h4>Pobrań w tym dniu</h4>
                              </div>
                          </div>
                          <div class="col-md-3">
                              <div class="well dash-box">
                                  <h2><?php echo $ile_tydz?></h2>
                                  <h4>Pobrań w tym tygodniu</h4>
                              </div>
                          </div>
                          <div class="col-md-3">
                              <div class="well dash-box">
                                  <h2><?php echo $ile_mies?></h2>
                                  <h4>Pobrań w tym miesiącu</h4>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          </div>
      </section>
      <footer class="footer">
          <div class="container">
              <span class="text-muted">Grupa Lewa &copy; 2018</span>
          </div>
      </footer>

      <script src="vendor/bootstrap/js/bootstrap.js"></script>
>>>>>>> kuba
   </body>
   
</html>