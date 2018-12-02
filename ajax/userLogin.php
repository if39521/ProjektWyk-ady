<?php
session_start();
require_once(__DIR__.'/../controller/UserController.php');
require_once(__DIR__.'/../classes/DB.php');

if (!empty($_POST)) {
	$user_controller = new UsersController($pdo);
	$password = $_POST['password'];
	$username = $_POST['username'];
	if ($user_controller->loginUser($username, $password)) {
		header("Location: ../wyklady.php");
		exit();
	} else {
		header("Location: ../login.php");
	}
}
?>