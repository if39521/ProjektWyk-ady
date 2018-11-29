<?php
require_once(__DIR__.'/../controller/FileController.php');
require_once(__DIR__.'/../controller/HistoryController.php');
require_once(__DIR__.'/../classes/DB.php');
$history_controller = new HistoryController($pdo);
$file_controller = new FilesController($pdo);


$fileName = basename($_GET['file']);
$file_type = basename($_GET['type']);
$catalog = $file_type == 'K' ? 'Kursy' : 'Wyklady';
$file =  __DIR__ . "/../$catalog/".$fileName;
$date = date("Y-m-d");

if(!file_exists($file)){ // file does not exist
    die('file not found');
} else {
    header("Cache-Control: public");
    header("Content-Description: File Transfer");
    header("Content-Disposition: attachment; filename=$file");
    header("Content-Type: application/zip");
    header("Content-Transfer-Encoding: binary");

    // read the file from disk
    readfile($file);

    if (!empty($_COOKIE['logged_user'])) {
        $user = json_decode($_COOKIE['logged_user']);
        $user_id = $user->user_id;
        $file = $file_controller->getFile($fileName);
		$file_id = $file['file_id'];
		$history_controller->addRecord($date, $user_id, $file_id);
    }
}
?>