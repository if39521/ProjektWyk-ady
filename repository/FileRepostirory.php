<?php
// require_once "interfaces/FileInterface.php";
require_once "../classes/Filter.php";
class FileRepository  {
    
    private $conection;

    public function __construct() {
            $this->connection = new DB();
    }
    public function findFileByFilename($filename) {
        $filename = (string) Filter::String( $filename );
        $con = new DB();
        $con->query('SELECT * FROM Files WHERE filename = :filename LIMIT 1');
        $con->bind(':filename', $filename);
        $row = $con->single();
        return $row;
    }

    public function getAllFiles() {
        $this->conection->query('SELECT * FROM Files');
        $row = $this->conection->resultset();
        return $row;
    }

    public function updateFile(File $file) {
        $file_id = (int) Filter::Int($file->file_id);
        $this->conection->query(
            'UPDATE Files SET
            filename = :filename,
            type = :type,
            subject = :subject
            WHERE file_id = :file_id
            ');
        $this->connection->bind(':filename', $file->filename);        
        $this->connection->bind(':type', $file->type);
        $this->connection->bind(':subject', $file->subject);
        $this->connection->bind(':file_id', $file_id);
        return $this->connection->execute();
    }

    public function deteleFileById($file_id) {
        $file_id = (int) Filter::Int($file_id);
        $this->connection->query('DELETE FROM Files WHERE file_id = :file_id ');
        $this->connection->bind(':file_id', $file_id);
        return $this->connection->execute();
    }
}
?>