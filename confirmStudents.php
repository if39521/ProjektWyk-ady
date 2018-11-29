<?php
session_start();
require_once(__DIR__.'/ajax/loadStudents.php');
$student_array = $user_controller->getAllStudents('n');
if (isset($_SESSION['password_change_msg'])) {
	$error = $_SESSION['password_change_msg'];
};

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Udostępnianie wykładów i kursów</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
	<link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/forgotPassword.css">

</head>
<body>
<<<<<<< HEAD
	
=======

>>>>>>> kuba
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" action='./ajax/activateStudent.php' method="POST">

					<span class="login100-form-title p-b-34 p-t-27">
						Confirm user as student
					</span>
					<div class="select">
						<select name="selected_student" id="slct">
							<?php foreach ($student_array as $student) { ?>
  							<option value="<?php echo $student['username'];?>"><?php echo $student['username'];?></option>
							<?php } ?>
						</select>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Activate student
						</button>
					</div>
					<div class='text-center fs-18 m-t-25' style = "color: #ff0a0a; font-weight: bold;">
<<<<<<< HEAD
						<?php 
=======
						<?php
>>>>>>> kuba
						if (!empty($_SESSION['confirmation_student']))
						echo $_SESSION['confirmation_student'];
						?>
					</div>
				</form>
			</div>
		</div>
	</div>
<<<<<<< HEAD
	
=======

>>>>>>> kuba

	<div id="dropDownSelect1"></div>
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="js/main.js"></script>

</body>
</html>

?>