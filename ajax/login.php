<?php
session_start();
	// Allow the config
	define('__CONFIG__', true);
	// Require the config
	require_once "../inc/config.php"; 
	if($_SERVER['REQUEST_METHOD'] == 'POST') {
		$return = [];
		$username = Filter::String( $_POST['username'] );
		$password = $_POST['password'];
		$user_found = User::Find($username, true);
		if($user_found) {

			$user_id = (int) $user_found['ID_User'];
			$hash = (string) $user_found['Password'];
			if(password_verify($password, $hash)) {
				// User is signed in
				$_SESSION['error_message'] = null;
				$_SESSION['login_user'] = $username;
				$_SESSION['user_id'] = $user_id;
				header("Location: ../welcome.php");
				exit();
			} else {
				$_SESSION['error_message'] = "Your Password is invalid";
				header("Location: ../index.php");
				exit();
			}
		} else {
			$_SESSION['error_message'] = "Account with this username doesnt exist";
			header("Location: ../index.php");
			exit();
		}
	} else {
		exit();
	}
?>