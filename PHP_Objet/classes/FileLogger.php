<?php

namespace Ign;

class FileLogger
{
    protected $file;
    
    public function __construct() {
        $filename = __DIR__ . '/../log/app.log';
        $this->file = fopen($filename, 'a');
    }
    
    public function log($msg)
    {
        fwrite($this->file,  "$msg\n");
    }
    
    public function __destruct() {
        fclose($this->file);
    }
}
