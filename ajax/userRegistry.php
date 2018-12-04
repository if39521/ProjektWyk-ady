<?php
session_start();
require_once(__DIR__.'/../controller/UserController.php');
require_once(__DIR__.'/../classes/DB.php');

if (!empty($_POST)) {
	$user_controller = new UsersController($pdo);
	$password = $_POST['password'];
	$confirm_password = $_POST['confirm_password'];
	$username = $_POST['username'];
	$remote_adress = $_SERVER['REMOTE_ADDR'];
	if ($user_controller->register($username, $password, $confirm_password, $remote_adress)) {
		header("Location: ../register.php");
		exit();
	} else {
        header("Location: ../index.php");
		exit();
    }
}
?>