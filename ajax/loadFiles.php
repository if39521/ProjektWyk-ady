<?php
require_once(__DIR__.'/../controller/FileController.php');
require_once(__DIR__.'/../classes/DB.php');

$file_controller = new FilesController($pdo);
?>