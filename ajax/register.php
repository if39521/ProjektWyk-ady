<?php 
	define('__CONFIG__', true);
	require_once "../inc/config.php"; 
	if($_SERVER['REQUEST_METHOD'] == 'POST') {
		$error_msg = "";
		$username = Filter::String( $_POST['username']);
		$password = $_POST['password'];
		$confirm_password = $_POST['confirm_password'];

		if (empty($password) || empty($username)) {
			header("Location: ../rejestracja.php");
			$_SESSION['error_msg'] = "Username field and password must be filled!";
			exit();
		}
		if ($confirm_password !== $password) {
			header("Location: ../rejestracja.php");
			$_SESSION['error_msg'] = "Password's must match";
			exit();
		}

		$user_found = User::Find($username);

		if($user_found) {
			$_SESSION['error_msg'] = "Account with this username already exist! Please choose another one";
			header("Location: ../rejestracja.php");
			exit();
		} else {
			// User does not exist, add them now. 
			$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
			
			$addUser = $con->prepare("INSERT INTO Users(Username, Password) VALUES(:username, :password)");
			$addUser->bindParam(':username', $username, PDO::PARAM_STR);
			$addUser->bindParam(':password', $password, PDO::PARAM_STR);
			$addUser->execute();
			$user_id = $con->lastInsertId();
			$_SESSION['user_id'] = (int) $user_id;
			$_SESSION['username'] = $username;
			$_SESSION['login_user'] = $username;
			header("Location: ../welcome.php");
			exit();
		}
	}
?>