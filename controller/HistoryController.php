<?php
require_once(__DIR__.'/../repository/DatabaseRepository.php');
require_once(__DIR__.'/../classes/Filter.php');
require_once(__DIR__.'/../entity/File.php');

class HistoryController
{
    private $history_repo;

    private $table = 'History';

    public function __construct(\PDO $pdo) {
        $this->history_repo = new DatabaseRepository($pdo, null);
    }


    public function getAllUserRecords() {
        $userArray = $this->history_repo->getAllRecords('Users');
        return $userArray;
    }

    public function getAllHistoryRecords() {
        $historyArray = $this->history_repo->getAllRecords($this->table);
        return $historyArray;
    }
}
?>