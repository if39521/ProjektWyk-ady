<?php
require_once(__DIR__.'/../repository/DatabaseRepository.php');
require_once(__DIR__.'/../classes/Filter.php');
require_once(__DIR__.'/../entity/File.php');
define("BASE_URL", DIRECTORY_SEPARATOR);
define("ROOT_PATH", $_SERVER['DOCUMENT_ROOT'] . BASE_URL);


class FilesController
{
    private $file_repo;
    private $columns = '(filename, c_date, file_type, file_subject)';
	private $bindNames = '(:filename, :c_date, :file_type, :file_subject)';
    private $column_names= array('filename','c_date','file_type', 'file_subject');
    private $table = 'Files';
    private $where;

    public function __construct(\PDO $pdo) {
        $this->file_repo = new DatabaseRepository($pdo,$this->bindNames);
    }

	public function uploadFileToDB($filename, $date, $filetype, $filesubject) {
		$file = new File(0,$filename, $filetype, $filesubject);
		$this->file_repo->addNewRecord($this->table, $this->columns,
		array($filename, $date, $filetype, $filesubject), $this->column_names);
		return true;	
	}
	
	public function Upload($filename, $filetmp, $filetype){
		if(is_uploaded_file($filetmp)) {
			if ($filetype == "Wyklad") {
				move_uploaded_file($filetmp, "../Wyklady/$filename"); 
				$_SESSION['file_message'] = "Plik o nazwie <b>$filename</b> został przeniesiony do katalogu <b>Wyklady</b>";
			} else {
				move_uploaded_file($filetmp, "../Kursy/$filename"); 	
				$_SESSION['file_message'] = "Plik o nazwie <b>$filename</b> został przeniesiony do katalogu <b>Kursy</b>";		
			}
		} 
	}	
	
	public function getAllFiles() {
		return $this->file_repo->getAllRecords($this->table);
	}
	
	public function getFile($filename) {
		$this->where = "filename = '$filename'";
        return $this->file_repo->findRecordByValue($this->table, $this->where);

	}

	public function deleteFileDB($filename) {
		$this->where = "filename = '$filename'";
		return $this->file_repo->deteleRecordByValue($this->table,$this->where);
	}
	
	public function deleteFile($filename,$filetype) {
		if ($filetype == "Wyklad") {
			$path = __DIR__ . "/../Wyklady/$filename";
			if (unlink($path)) {
				$_SESSION['del_message'] = "Plik skasowany";
			} else {
				$_SESSION['del_message'] = "Plik nieskasowany error";
			}
		} else {
			$path = __DIR__ . "/../Kursy/$filename";	
			if (unlink($path)) {
				$_SESSION['del_message'] = "Plik skasowany";
			} else {
				$_SESSION['del_message'] = "Plik nieskasowany error";
			}
		}
	}
}
?>