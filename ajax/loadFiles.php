<?php
require_once(__DIR__.'/../controller/FileController.php');
<<<<<<< HEAD
require_once(__DIR__.'/../controller/HistoryController.php');
require_once(__DIR__.'/../classes/DB.php');

$file_controller = new FilesController($pdo);
$history_controller = new HistoryController($pdo);

=======
require_once(__DIR__.'/../classes/DB.php');

$file_controller = new FilesController($pdo);
>>>>>>> kuba
?>