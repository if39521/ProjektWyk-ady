<?php
require_once "../classes/DatabaseAdapter.php";
require_once "../interfaces/FileRepositoryInterface.php";
class FileRepository  {
    
    private $conection;

    public function __construct() {
            $this->connection = new DatabaseAdapter();
    }
    public function findFileByFilename($filename) {
        $filename = (string) Filter::String( $filename );
        $this->connection->query('SELECT * FROM Files WHERE filename = :filename LIMIT 1');
        $this->connection->bind(':filename', $filename);
        $row = $this->connection->single();
        return $row;
    }

    public function getAllFiles() {
        $this->conection->query('SELECT * FROM Files');
        $row = $this->conection->resultset();
        return $row;
    }

    public function getAllFilesByType($type) {
        $type = (string) Filter::String($type);
        $this->connection->query('SELECT * FROM Files WHERE file_type = :file_type');
        $this->connection->bind(':file_type', $type);
        return $this->connection->resultSet();
    }

    public function getAllFilesBySubject($subject) {
        $subject = (string) Filter::String($subject);
        $this->connection->query('SELECT * FROM Files WHERE file_subject = :file_subject');
        $this->connection->bind(':file_subject', $subject);
        return $this->connection->resultSet();
    }

    public function updateFile(File $file) {
        $file_id = (int) Filter::Int($file->file_id);
        $this->conection->query(
            'UPDATE Files SET
            filename = :filename,
            file_type = :file_type,
            file_subject = :file_subject
            WHERE file_id = :file_id
            ');
        $this->connection->bind(':filename', $file->filename);        
        $this->connection->bind(':file_type', $file->file_type);
        $this->connection->bind(':file_subject', $file->file_subject);
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