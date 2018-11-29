<?php
session_start();
require_once(__DIR__.'/ajax/loadStudents.php');
$student_array = $user_controller->getAllStudents('s');
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
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" action='./ajax/passwordChange.php' method="POST">

					<span class="login100-form-title p-b-34 p-t-27">
						Password reset
					</span>
					<div class="select">
						<select name="selected_student" id="slct">
							<?php foreach ($student_array as $student) { ?>
  							<option value="<?php echo $student['username'];?>"><?php echo $student['username'];?></option>
							<?php } ?>
						</select>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter new password">
						<input class="input100" type="password" name="new_password" placeholder="New Password">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
                    </div>
                    
                    <div class="wrap-input100 validate-input" data-validate="Enter new password">
						<input class="input100" type="password" name="new_password_confirm" placeholder="Confirm new password">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Change password
						</button>
					</div>
					<div class='text-center fs-18 m-t-25' style = "color: #ff0a0a; font-weight: bold;">
						<?php 
						if (!empty($_SESSION['password_change_msg']))
						echo $_SESSION['password_change_msg'];
						?>
					</div>
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="js/main.js"></script>

</body>
</html>
