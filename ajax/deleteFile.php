<?php
session_start();
require_once(__DIR__.'/../controller/FileController.php');
require_once(__DIR__.'/../classes/DB.php');

if (isset($_POST['delete'])) {
	$file_controller = new FilesController($pdo);	
	$fileName = basename($_GET['file']);
	$file_type = basename($_GET['type']);
	if (($file_controller->deleteFileDB($filename))&&($file_controller->deleteFile($filename,$file_type))) {	
		header("Location: ../welcome.php");
		exit();
	} else {
		header("Location: ../welcome.php");
		exit();
    }
}