<?php
session_start();
require_once '../controller/UserController.php';
if (!empty($_POST)) {
    if (!empty($_COOKIE['logged_user'])) {
        $user = json_decode($_COOKIE['logged_user']);
        $user_role = $user->user_role;
    } else {
        header("Location: ../index.php");
        exit();
    }
	$user_controller = new UsersController();
	$password = $_POST['current_password'];
    $new_password = $_POST['new_password'];
    $confirm_new_password = $_POST['new_password_confirm'];
	if ($user_controller->changeUserPassword($user_role, $password, $new_password, $confirm_new_password)) {
		header("Location: ../welcome.php");
		exit();
	} else {
		header("Location: ../forgotPassword.php");
	}
}
?>