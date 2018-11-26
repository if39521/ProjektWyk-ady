<?php
$file = basename($_GET['file']);
$file_type = basename($_GET['type']);
$catalog = $file_type == 'K' ? 'Kursy' : 'Wyklady';
$file =  __DIR__ . "/./$catalog/".$file;

if(!file_exists($file)){ // file does not exist
    die('file not found');
} else {
    header("Cache-Control: public");
    header("Content-Description: File Transfer");
    header("Content-Disposition: attachment; filename=$file");
    header("Content-Type: application/zip");
    header("Content-Transfer-Encoding: binary");

    // read the file from disk
    readfile($file);
}
?>