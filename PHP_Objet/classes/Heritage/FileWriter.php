<?php

namespace Ign\Heritage;

class FileWriter
{
    protected $file;
    
    public function __construct($filename, $mode) {
        $this->file = fopen($filename, $mode);
    }

    public function write($msg)
    {
        fwrite($this->file, $msg);
    }
    
    public function __destruct() {
        fclose($this->file);
    }
}

