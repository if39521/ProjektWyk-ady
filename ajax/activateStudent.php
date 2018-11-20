<?php
session_start();
require_once(__DIR__.'/../controller/UserController.php');
require_once(__DIR__.'/../classes/DB.php');

if (!empty($_POST)) {
    if (!empty($_COOKIE['logged_user'])) {
        $user = json_decode($_COOKIE['logged_user']);
        $user_role = $user->user_role;
    } else {
        $user_role = false;
    }
	$user_controller = new UsersController($pdo);
	$username = $_POST['selected_student'];
	$user_controller->confirmUserAsStudent($user_role, $username);
		header("Location: ../confirmStudents.php");
        exit();
}
?>