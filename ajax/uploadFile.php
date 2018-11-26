<?php
session_start();
require_once(__DIR__.'/../controller/FileController.php');
require_once(__DIR__.'/../classes/DB.php');

if ((isset($_POST['upload'])) && (!empty($_COOKIE['logged_user']))) {
	$file_controller = new FilesController($pdo);
	$history_controller = new HistoryController($pdo);

	$user = json_decode($_COOKIE['logged_user']);
	$user_id = $user->user_id;
	
	$filetmp = $_FILES['plik']['tmp_name']; 
	$filename = $_FILES['plik']['name'];
	$filetype = $_POST['fileType'];
	$filesubject = $_POST['subjectFile'];
	$date = date("Y-m-d");
	if (($file_controller->uploadFileToDB($filename,$date, $filetype, $filesubject))
		&&($file_controller->Upload($filename, $filetmp, $filetype))) {
		$file = $file_controller->getFile();
		$file_id = $file['file_id'];
		$history_controller->addRecord($user_id, $file_id);
		header("Location: ../welcome.php");
		exit();
	} else {
        header("Location: ../welcome.php");
		$_SESSION['file_message'] = "Błąd metod FileController";
		exit();
    }
}
?>