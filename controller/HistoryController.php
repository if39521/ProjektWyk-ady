<?php
require_once(__DIR__.'/../repository/DatabaseRepository.php');
require_once(__DIR__.'/../classes/Filter.php');
require_once(__DIR__.'/../entity/File.php');

class HistoryController
{
    private $history_repo;
    private $columns = '(c_date, user_id, file_id)';
	private $bindNames = '(:c_date, :user_id, :file_id)';
    private $column_names= array('c_date','user_id', 'file_id');
    private $table = 'History';
    private $where;

    public function __construct(\PDO $pdo) {
        $this->history_repo = new DatabaseRepository($pdo, $this->bindNames);
    }


    public function getAllUserRecords() {
        $userArray = $this->history_repo->getAllRecords('Users');
        return $userArray;
    }

    public function getAllHistoryRecords($user_id = null) {
        $user_id == null ?
        $historyArray = $this->history_repo->getAllRecords($this->table)
        : 
        $this->where = "user_id = '$user_id'";
        $historyArray = $this->history_repo->getAllRecords($this->table, $this->where);

        return $historyArray;
    }

    

    public function addRecord($date, $user_id, $file_id) {
		$this->history_repo->addNewRecord($this->table, $this->columns,
		array($date, $user_id, $file_id), $this->column_names);
		return true;	

    }
}
?>