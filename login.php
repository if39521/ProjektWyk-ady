<?php
session_start();
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
</head>
<body>
	
	<div class="limiter login-container">
		<div class="container-login100 container-login">
			<div class="wrap-login100">
				<form class="login100-form validate-form" action='./ajax/userLogin.php' method="POST">
					<span class="login100-form-logo">
						<i class="zmdi zmdi-landscape"></i>
					</span>

					<span class="login100-form-title p-b-34 p-t-27">
						Log in
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="text" name="username" placeholder="Username"
						value="<?php if(isset($_COOKIE["member_login"])) { echo $_COOKIE["member_login"]; } ?>"
						>
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="password" placeholder="Password"
						value="<?php if(isset($_COOKIE["member_password"])) { echo $_COOKIE["member_password"]; } ?>"
						>
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>

					<div class="contact100-form-checkbox">
						<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember"
						<?php if(isset($_COOKIE["member_login"])) { ?> checked <?php } ?>
						>
						<label class="label-checkbox100" for="ckb1">
							Remember me
						</label>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Login
						</button>
					</div>
					<div class='text-center fs-18 m-t-25' style = "color: #ff0a0a; font-weight: bold;">
						<?php 
						if (!empty($_SESSION['error_message']))
						echo $_SESSION['error_message'];
						?>
					</div>
					<div class="login-footer p-t-25">
						<div class='login-footer-box text-center'>
							<a class="txt1" href="forgotPassword.php">
								Forgot Password?
							</a>
						</div>
						<div class='login-footer-box text-center'>
							<span class='txt1'>Not registered?</span>
							<a class="acount-create txt1" href="register.php">
								 Create and account
							</a>

                            <a href="index.php">wróć</a><br/>
						</div>
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
