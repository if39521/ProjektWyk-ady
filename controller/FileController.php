<?php
require_once(__DIR__.'/../repository/DatabaseRepository.php');
require_once(__DIR__.'/../classes/Filter.php');
require_once(__DIR__.'/../entity/File.php');

class FilesController
{
    private $file_repo;
    private $columns = '(filename, file_type, file_subject)';
    private $column_names= array('filename', 'file_type ', 'user_role');
    private $table = 'Files';

    public function __construct(\PDO $pdo) {
        $this->file_repo = new DatabaseRepository($pdo);
    }

}
?>