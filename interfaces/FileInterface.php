<?php
    interface FileRepositoryInterface
    {
    public function findFileByName($name);

    public function getAllFiles();

    public function getAllFilesByType($type);

    public function getAllFilesBySubject($subject);

    public function updateFile(File $file);

    public function deteleFileById($file_id);

    }
?>
