<?php
require_once(__DIR__.'/../repository/DatabaseRepository.php');
require_once(__DIR__.'/../classes/Filter.php');
require_once(__DIR__.'/../entity/File.php');

class FilesController
{
    private $file_repo;
    private $columns = '(filename, c_date, file_type, file_subject)';
	private $bindNames = '(:filename, :c_date, :file_type, :file_subject)';
    private $column_names= array('filename','c_date','file_type', 'file_subject');
    private $table = 'Files';

    public function __construct(\PDO $pdo) {
        $this->file_repo = new DatabaseRepository($pdo,$this->bindNames);
    }

	public function uploadFileToDB($filename, $date, $filetype, $filesubject) {
		$file = new File(0,$filename, $filetype, $filesubject);
		$this->file_repo->addNewRecord($this->table, $this->columns,
		array($filename, $date, $filetype, $filesubject), $this->column_names);
	}
	
	public function Upload($filename, $filetmp, $filetype){
		if(is_uploaded_file($filetmp)) {
			if ($filetype == "Wyklad") {
				move_uploaded_file($filetmp, "../Wyklady/$filename"); 
				$_SESSION['file_message'] = "Plik o nazwie $filename został przeniesiony do katalogu /Wyklady";
			} else {
				move_uploaded_file($filetmp, "../Kursy/$filename"); 	
				$_SESSION['file_message'] = "Plik o nazwie $filename został przeniesiony do katalogu /Kursy";		
			}
		} 
	}
	
}
?>