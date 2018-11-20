<?php
session_start();
require_once '../controller/FileController.php';

if (isset($_POST['upload'])) {
	$file_controller = new FilesController();
	$filetmp = $_FILES['plik']['tmp_name']; 
	$filename = $_FILES['plik']['name'];
	$filetype = $_POST['fileType'];
	$filesubject = $_POST['subjectFile'];
	$date = date("Y-m-d");
	if (($file_controller->uploadFileToDB($filename,$date, $filetype, $filesubject))
		&&($file_controller->Upload($filename, $filetmp, $filetype))) {
		header("Location: ../welcome.php");
		exit();
	} else {
        header("Location: ../welcome.php");
		$_SESSION['file_message'] = "Błąd metod FileController";
		exit();
    }
}
?>