<?php
    session_start();
    require_once(__DIR__.'/../controller/UserController.php');
    require_once(__DIR__.'/../classes/DB.php');
    $user_controller = new UsersController($pdo);

    if(session_destroy()) {
        $user_controller->logout();
        header("Location: ../index.php");
        exit();
   }
?>