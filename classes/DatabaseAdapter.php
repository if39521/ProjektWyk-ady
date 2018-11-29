<?php
require_once(__DIR__.'/DB.php');
require_once(__DIR__.'/../interfaces/DatabaseAdapterInterface.php');
    class DatabaseAdapter implements DatabaseAdapterInterface {

        private $stmt;
        protected $con;

        public function __construct(\PDO $pdo) {
            $this->con = $pdo;
        }
        public function query($query){   
            $this->stmt = $this->con->prepare($query);  
        }  
    
        public function bind($param, $value, $type = null){  
            if (is_null($type)) {   
            switch (true) {  
            case is_int($value):  
            $type = PDO::PARAM_INT;  
            break;  
            case is_bool($value):  
            $type = PDO::PARAM_BOOL;  
            break;  
            case is_null($value):  
            $type = PDO::PARAM_NULL;  
            break;  
            default:  
            $type = PDO::PARAM_STR;  
            }  
            }  
            $this->stmt->bindValue($param, $value, $type);  
        }  
    
        public function execute(){  
            $this->stmt->execute(); 
        }  
    
        public function resultset() {  
            $this->execute();  
            return $this->stmt->fetchAll(PDO::FETCH_ASSOC);  
        }  
    
        public function single(){
            $this->execute();  
            return $this->stmt->fetch(PDO::FETCH_ASSOC);
        }  
    
        public function rowCount(){  
            return $this->stmt->rowCount();  
        }  
    
        public function lastInsertId(){  
            return $this->dbh->lastInsertId();  
        }  
    
        public function beginTransaction(){  
            return $this->dbh->beginTransaction();  
        }  
    
        public function endTransaction(){  
            return $this->dbh->commit();  
        }  
    }
?>