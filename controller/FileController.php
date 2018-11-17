<?php
require_once '../repository/FileRepository.php';
require_once '../classes/Filter.php';
require_once '../entity/File.php';

class FilesController
{
    private $file_repo;

    public function __construct() {
        $this->file_repo = new FileRepository();
    }

}
?>