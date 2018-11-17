<?php
session_start();
require_once '../controller/UserController.php';
if (!empty($_POST)) {
	$user_controller = new UsersController();
	$password = $_POST['password'];
	$confirm_password = $_POST['confirm_password'];
	$username = $_POST['username'];
	$remote_adress = $_SERVER['REMOTE_ADDR'];
	if ($user_controller->register($username, $password, $confirm_password, $remote_adress)) {
		header("Location: ../index.php");
		exit();
	} else {
        header("Location: ../register.php");
		exit();
    }
}
?>