<?php
require_once(__DIR__.'/../controller/UserController.php');
require_once(__DIR__.'/../classes/DB.php');

$user_controller = new UsersController($pdo);
?>