<?php
require_once '../repository/DatabaseRepository.php';
require_once '../classes/Filter.php';
require_once '../entity/File.php';

class FilesController
{
    private $file_repo;
    private $columns = '(filename, file_type, file_subject)';
    private $column_names= array('filename', 'file_type ', 'user_role');
    private $table = 'Files';

    public function __construct() {
        $this->file_repo = new DatabaseRepository();
    }

}
?>