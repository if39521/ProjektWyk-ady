<?php

class Filee {
    private $file_id;
    private $filename;
    private $type;
    private $subject;
    
    public function __construct($file_id, $filename, $type, $subject) {
        $this->file_id = $file_id;
        $this->filename = $filename;
        $this->type = $type;
        $this->subject = $subject;
    }

    /**
     * Get the value of subject
     */ 
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * Set the value of subject
     *
     * @return  self
     */ 
    public function setSubject($subject)
    {
        $this->subject = $subject;

        return $this;
    }

    /**
     * Get the value of type
     */ 
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set the value of type
     *
     * @return  self
     */ 
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get the value of filename
     */ 
    public function getFilename()
    {
        return $this->filename;
    }

    /**
     * Set the value of filename
     *
     * @return  self
     */ 
    public function setFilename($filename)
    {
        $this->filename = $filename;

        return $this;
    }

    /**
     * Get the value of file_id
     */ 
    public function getFile_id()
    {
        return $this->file_id;
    }

    /**
     * Set the value of file_id
     *
     * @return  self
     */ 
    public function setFile_id($file_id)
    {
        $this->file_id = $file_id;

        return $this;
    }
}
?>