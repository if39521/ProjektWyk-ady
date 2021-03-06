<?php
require_once(__DIR__.'/../interfaces/DatabaseRepositoryInterface.php');
require_once(__DIR__.'/../classes/DatabaseAdapter.php');

class DatabaseRepository implements DatabaseRepositoryInterface {
    
    private $connection;
    private $bind_names;
    public function __construct(\PDO $pdo, $bind_names) {
            $this->connection = new DatabaseAdapter($pdo);
            $this->bind_names = $bind_names;
    }

    public function addNewRecord($table, $columns, $values, $column_names) {
        $buildSQL = '';
        if (is_array($columns)) {
    
            foreach($columns as $key => $column) :
            if ($key == 0) {
                  //first item
                  $buildSQL .= $column.' = :' .$column;
                } else {
                  //every other item follows with a ","
                  $buildSQL .= ', '.$column.' = :'. $column;
                }
          endforeach;
       
        } else {
          //we are only updating one field
              $buildSQL .= $columns.' = :value';
        }
        $this->connection->query('INSERT INTO '.$table.'
        '.$columns.' VALUES '.$this->bind_names);
        if (is_array($values)) {
            for ($i = 0; $i <count($values); $i++) {
                $this->connection->bind(':'.$column_names[$i], $values[$i]);
            }
            $this->connection->execute();
        } else {
              $this->connection->bind(':value', $values);
             return $this->connection->execute();
        }
    }
    
    public function findRecordByValue($table, $where) {
        $this->connection->query('SELECT * FROM '.$table.' WHERE '.$where) ;
        $row = $this->connection->single();
        return $row;
    }

    public function getAllRecords($table, $where=null) {
        if($where != null) {
          $this->connection->query('SELECT * FROM ' .$table. ' WHERE '.$where);
          $row = $this->connection->resultset();
          return $row;
        }
        $this->connection->query('SELECT * FROM '.$table);
        $row = $this->connection->resultset();
        return $row;
    }

    public function getAllRecordsWithLimit($table, $limit, $offset) {
        $this->connection->query('SELECT * FROM ' .$table. ' LIMIT ' .$limit. ' OFFSET ' .$offset );
        $row =$this->connection->resultset();
        return $row;
    }

    public function updateRecord($table, $columns, $values, $where) {
        $buildSQL = '';
        if (is_array($columns)) {
    
            foreach($columns as $key => $column) :
            if ($key == 0) {
                  //first item
                  $buildSQL .= $column.' = :' .$column;
                } else {
                  //every other item follows with a ","
                  $buildSQL .= ', '.$column.' = :'. $column;
                }
          endforeach;
       
        } else {
          //we are only updating one field
              $buildSQL .= $columns.' = :value';
        }
       
        $this->connection->query('UPDATE '.$table.' SET '.$buildSQL.'
        WHERE '.$where);
       
        //execute the update for one or many values
        if (is_array($values)) {
            foreach($columns as $column) :
                foreach($values as $val) :
                $this->connection->bind(':'.$column, $val);
                endforeach;
            endforeach;    
            $this->connection->execute();
        } else {
              $this->connection->bind(':value', $values);
             return $this->connection->execute();
        }
    }

    public function deteleRecordByValue($table, $where) {
        $this->connection->query('DELETE FROM ' .$table.' WHERE '.$where);
        return $this->connection->execute();
    }
}
?>