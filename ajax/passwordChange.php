<?php
session_start();
require_once(__DIR__.'/../controller/UserController.php');
require_once(__DIR__.'/../classes/DB.php');

if (!empty($_POST)) {
    $user = json_decode($_COOKIE['logged_user']);
    $user_role = $user->user_role;

	$user_controller = new UsersController($pdo);
	$username = $_POST['selected_student'];
    $new_password = $_POST['new_password'];
    $confirm_new_password = $_POST['new_password_confirm'];
	if ($user_controller->changeUserPassword($user_role, $username, $new_password, $confirm_new_password)) {
		header("Location: ../welcome.php");
		exit();
	} else {
		header("Location: ../forgotPassword.php");
	}
}
?>