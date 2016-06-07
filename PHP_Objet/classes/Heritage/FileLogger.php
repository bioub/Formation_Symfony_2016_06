<?php

namespace Ign\Heritage;

class FileLogger extends FileWriter
{
    public function __construct($filename) {
        parent::__construct($filename, 'a');
    }
    
    public function log($msg)
    {
        $this->write("$msg\n");
    }
    
}
