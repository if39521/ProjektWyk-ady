<?php
session_start();
require_once '../controller/UserController.php';
if (!empty($_POST)) {
	$user_controller = new UsersController();
	$password = $_POST['password'];
	$username = $_POST['username'];
	if ($user_controller->loginUser($username, $password)) {
		header("Location: ../welcome.php");
		exit();
	} else {
		header("Location: ../index.php");
	}
}
?>