<?php
session_start();
require_once(__DIR__.'/../controller/FileController.php');
require_once(__DIR__.'/../classes/DB.php');

if (!empty($_POST)) {

	$file_controller = new FilesController($pdo);
    $filename = $_POST['edit_course'];
    $currentName = $_POST['current_name'];
    $fileType = $_POST['file_type'];
    
    $catalog = $fileType == 'K' ? 'Kursy' : 'Wyklady';
    
    $file_controller->changeFileName($currentName, $filename);
        rename("../$catalog/".$currentName, "../$catalog/".$filename);
		header("Location: ../wyklady.php");
        exit();
}
?>